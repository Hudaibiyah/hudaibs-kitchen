<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: login.html");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$dbname = "contact_db";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="contact_data.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Name', 'Email', 'Message']);

$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
$conn->close();
exit();
?>
