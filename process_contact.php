<?php
// This file should be named "process_contact.php"
// Include database connection
require_once "db_config.php";

// Initialize variables
$success_message = "";
$error_message = "";

// Process contact form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $company = $_POST["company"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    $submission_date = date("Y-m-d H:i:s");
    
    // Validate input
    if (empty($name) || empty($company) || empty($email) || empty($phone) || empty($message)) {
        $error_message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } else {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO contact_requests (name, company, email, phone, message, submission_date) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $company, $email, $phone, $message, $submission_date);
        
        // Execute query
        if ($stmt->execute()) {
            $success_message = "Your demo request has been submitted successfully! Our team will contact you shortly.";
            
            // Optional: Send email notification
            $to = "info@nextgenfood.tech"; // Change to your email
            $subject = "New Demo Request from $name";
            $email_message = "A new demo request has been submitted:\n\n";
            $email_message .= "Name: $name\n";
            $email_message .= "Company: $company\n";
            $email_message .= "Email: $email\n";
            $email_message .= "Phone: $phone\n";
            $email_message .= "Message: $message\n";
            
            $headers = "From: webmaster@nextgenfood.tech\r\n";
            
            // Uncomment below to enable email sending
            // mail($to, $subject, $email_message, $headers);
        } else {
            $error_message = "Sorry, there was an error submitting your request. Please try again later.";
        }
        
        $stmt->close();
    }
} else {
    // Redirect to contact form if accessed directly without POST data
    header("Location: contact.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Request - NextGen Food Processing</title>
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
        
        /* Additional styling for response messages */
        .response-section {
            min-height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 0;
        }
        
        .response-container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.1);
            background: #fff;
        }
        
        .success-message, .error-message {
            padding: 20px;
        }
        
        .success-message i, .error-message i {
            font-size: 60px;
            margin-bottom: 20px;
        }
        
        .success-message i {
            color: #4CAF50;
        }
        
        .error-message i {
            color: #f44336;
        }
        
        .success-message h2, .error-message h2 {
            margin-bottom: 15px;
            font-size: 28px;
        }
        
        .success-message p, .error-message p {
            margin-bottom: 25px;
            font-size: 16px;
            line-height: 1.6;
        }
        
        .success-message .btn, .error-message .btn {
            display: inline-block;
            margin-top: 15px;
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
                </ul>
                <div class="auth-buttons">
                    <a href="login.php" class="btn btn-outline">Login</a>
                    <a href="signup.php" class="btn btn-primary">Sign Up</a>
                </div>
            </nav>
        </div>
    </header>

    <section class="response-section">
        <div class="container">
            <div class="response-container">
                <?php if (!empty($success_message)): ?>
                    <div class="success-message">
                        <i class="fas fa-check-circle"></i>
                        <h2>Thank You!</h2>
                        <p><?php echo $success_message; ?></p>
                        <a href="index.php" class="btn">Return to Homepage</a>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($error_message)): ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <h2>Oops!</h2>
                        <p><?php echo $error_message; ?></p>
                        <a href="contact.php" class="btn">Try Again</a>
                    </div>
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