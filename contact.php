<?php
$host = "localhost";
$db = "contact_db";
$user = "root"; // replace with your DB username
$pass = "";     // replace with your DB password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Prepare SQL
$sql = "INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $phone, $message);

if ($stmt->execute()) {
    echo "<script>alert('Message submitted successfully!'); window.location.href='contact.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
