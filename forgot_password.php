<?php
require_once "db_config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    if (!empty($email)) {
        // Check if user exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        if (!$stmt) {
            die("SQL Prepare Error (SELECT): " . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // Generate token and expiry
            $token = bin2hex(random_bytes(32));
            $expires = date("Y-m-d H:i:s", strtotime('+1 hour'));

            // Update user's reset token and expiry
            $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE email = ?");
            if (!$stmt) {
                die("SQL Prepare Error (UPDATE): " . $conn->error);
            }
            $stmt->bind_param("sss", $token, $expires, $email);
            $stmt->execute();

            // Simulate sending email (you'll replace this with real email later)
            $reset_link = "http://localhost/FPS/reset_password.php?token=$token";
            $message = "Password reset link (simulated): <a href='$reset_link'>$reset_link</a>";
        } else {
            $message = "No account found with that email.";
        }
    } else {
        $message = "Please enter your email.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-form-container">
        <h2>Forgot Password</h2>
        <?php if ($message): ?>
            <div class="info-message"><?= $message ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Send Reset Link</button>
        </form>
    </div>
</body>
</html>
