<?php
// Start session
session_start();

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to homepage if already logged in
    exit();
}

// Include database connection
require_once "db_config.php";

$signup_error = "";
$signup_success = "";

// Process signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    
    // Validate input
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $signup_error = "All fields are required.";
    } elseif ($password != $confirm_password) {
        $signup_error = "Passwords do not match.";
    } elseif (strlen($password) < 8) {
        $signup_error = "Password must be at least 8 characters long.";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $signup_error = "Email is already registered. Please use a different email or login.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Prepare SQL statement for insertion
            $stmt = $conn->prepare("INSERT INTO users (name, email, password, created_at) VALUES (?, ?, ?, NOW())");
            $stmt->bind_param("sss", $name, $email, $hashed_password);
            
            if ($stmt->execute()) {
                $signup_success = "Account created successfully! You can now <a href='login.php'>login</a>.";
            } else {
                $signup_error = "Something went wrong. Please try again later.";
            }
        }
        
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - NextGen Food Processing</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Make the site name link look like plain text */
        .logo a {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }
        .logo a:hover {
            color: inherit;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <a href="index.php"><i class="fas fa-seedling"></i> NextGen Food Processing</a>
                </div>
                <ul class="nav-links">
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#features">Features</a></li>
                    <li><a href="index.php#process">Process</a></li>
                    <li><a href="index.php#dashboard">Dashboard</a></li>
                    <li><a href="index.php#contact" class="btn">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="auth-section">
        <div class="container">
            <div class="auth-form-container">
                <h2>Create an Account</h2>
                
                <?php if (!empty($signup_error)): ?>
                    <div class="error-message"><?php echo $signup_error; ?></div>
                <?php endif; ?>
                
                <?php if (!empty($signup_success)): ?>
                    <div class="success-message"><?php echo $signup_success; ?></div>
                <?php else: ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                            <small>Password must be at least 8 characters long.</small>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                        <p class="form-footer">
                            Already have an account? <a href="login.php">Login</a>
                        </p>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="copyright">
                <p>&copy; 2025 NextGen Food Processing. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
