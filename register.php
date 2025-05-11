<?php
$host = "localhost";
$user = "root"; // change if using another user
$password = ""; // change if your MySQL has a password
$dbname = "user_registration";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize input
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashed password

// Insert into database
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    // Redirect to login page after successful registration
    header("Location: login.html");
    exit(); // Don't forget to exit after redirect
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
