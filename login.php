<?php
session_start(); 
$host = "localhost";
$user = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "user_registration"; // Your database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the login input values
$email = htmlspecialchars($_POST['email']);
$password = $_POST['password']; // plain password (to verify)

if ($email === "admin@123" && $password === "admin") {
    $_SESSION['is_admin'] = true;
    header("Location: admin_dasboard.php");
    exit();
}

// Check if user exists
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Verify the password
    if (password_verify($password, $user['password'])) {
        echo "Login successful!";
        // Redirect to dashboard or another page
        header("Location: home.html"); // Redirect after successful login
    } else {
        echo "Invalid credentials.";
    }
} else {
    echo "No user found with this email.";
}

$stmt->close();
$conn->close();
?>
