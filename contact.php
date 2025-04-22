<?php
// This file should be named "contact.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Demo - NextGen Food Processing</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /<span style="color: red;">*</span> Make the site name link look like plain text <span style="color: red;">*</span>/
        .logo a {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }
        .logo a:hover {
            color: inherit;
        }
        
        /<span style="color: red;">*</span> Additional styling for contact form <span style="color: red;">*</span>/
        .contact-section {
            padding: 80px 0;
        }
        
        .contact-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.1);
            background: #fff;
        }
        
        .contact-form h2 {
            margin-bottom: 30px;
            text-align: center;
            font-size: 32px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .form-group textarea {
            height: 150px;
            resize: vertical;
        }
        
        .submit-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .submit-btn:hover {
            background-color: #3e8e41;
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

    <section class="contact-section">
        <div class="container">
            <div class="contact-container">
                <div class="contact-form">
                    <h2>Request a Demo</h2>
                    <form action="process_contact.php" method="POST">
                        <div class="form-group">
                            <label for="name">Full Name <span style="color: red;">*</span></label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="company">Company Name <span style="color: red;">*</span></label>
                            <input type="text" id="company" name="company" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address <span style="color: red;">*</span></label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number <span style="color: red;"><span style="color: red;">*</span></span></label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Your Message <span style="color: red;">*</span></label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">Submit Request</button>
                    </form>
                </div>
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