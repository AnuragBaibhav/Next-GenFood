<?php
// Database configuration
$servername = "localhost"; // Change if your DB is hosted elsewhere
$username = "root";        // Default XAMPP/MySQL username
$password = "";            // Default XAMPP/MySQL password (empty)
$database = "nextgen_food"; // Your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to ensure proper handling of special characters
$conn->set_charset("utf8mb4");
?>