<?php
// Start session
session_start();

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Include database connection
require_once "db_config.php";

$login_error = "";

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $login_error = "Both email and password are required.";
    } else {
        $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user["password"])) {
                session_start();

                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                $_SESSION["user_email"] = $user["email"];

                header("Location: index.php");
                exit();
            } else {
                $login_error = "Invalid email or password.";
            }
        } else {
            $login_error = "Invalid email or password.";
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
    <title>Login - NextGen Food Processing</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Inline CSS to make logo link look like plain text */
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
                <h2>Login to Your Account</h2>

                <?php if (!empty($login_error)): ?>
                    <div class="error-message"><?php echo $login_error; ?></div>
                <?php endif; ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <p class="form-footer">
                        <a href="forgot_password.php">Forgot Password?</a>
                        <span>Don't have an account? <a href="signup.php">Sign Up</a></span>
                    </p>
                </form>
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
