<?php
// Direct database configuration - no external file
$servername = "localhost";
$username = "root";
$password = "";
$database = "nextgen_food";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection and show error if it fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Enable full error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Initialize variables
$token = $_GET['token'] ?? '';
$message = "";
$debug_info = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $new_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    // DEBUGGING - Check what tables exist in the database
    $tables_result = $conn->query("SHOW TABLES");
    $debug_info .= "<h3>Tables in database:</h3><ul>";
    while ($table = $tables_result->fetch_array()) {
        $debug_info .= "<li>" . $table[0] . "</li>";
    }
    $debug_info .= "</ul>";
    
    // Verify if users table exists and check its structure
    $users_structure = $conn->query("DESCRIBE users");
    if (!$users_structure) {
        $debug_info .= "<p style='color:red'>The 'users' table does not exist! Error: " . $conn->error . "</p>";
    } else {
        $debug_info .= "<h3>Structure of users table:</h3><ul>";
        while ($column = $users_structure->fetch_assoc()) {
            $debug_info .= "<li>" . $column['Field'] . " - " . $column['Type'] . "</li>";
        }
        $debug_info .= "</ul>";
    }
    
    // Check if a user with the token exists using a simple query
    $check_query = "SELECT id FROM users WHERE reset_token = '" . $conn->real_escape_string($token) . "'";
    $debug_info .= "<p>Executing query: " . $check_query . "</p>";
    
    $result = $conn->query($check_query);
    
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user["id"];
        
        $debug_info .= "<p>Found user with ID: " . $user_id . "</p>";
        
        // Try a direct update query
        $update_sql = "UPDATE users SET password = '" . $conn->real_escape_string($new_password) . "' WHERE id = " . (int)$user_id;
        $debug_info .= "<p>Executing update: " . $update_sql . "</p>";
        
        if ($conn->query($update_sql) === TRUE) {
            $message = "Password updated successfully! <a href='login.php'>Login now</a>";
            $debug_info .= "<p style='color:green'>Update successful</p>";
        } else {
            $message = "Error updating password";
            $debug_info .= "<p style='color:red'>Update failed: " . $conn->error . "</p>";
        }
    } else {
        $message = "Invalid or expired token";
        $debug_info .= "<p>User not found with this token or query error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #f7f7f7; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="password"] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #4CAF50; color: white; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer; }
        .info-message { padding: 10px; margin-bottom: 15px; border-radius: 4px; background: #f8d7da; color: #721c24; }
        .debug-info { margin-top: 20px; padding: 15px; background: #f8f9fa; border: 1px solid #ddd; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        
        <?php if ($message): ?>
            <div class="info-message"><?= $message ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
        
        <!-- Debugging Information -->
        <?php if ($debug_info): ?>
            <div class="debug-info">
                <h3>Debugging Information</h3>
                <?= $debug_info ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>