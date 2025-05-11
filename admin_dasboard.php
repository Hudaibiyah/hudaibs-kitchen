<?php
session_start();

// ✅ Only allow admin access
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: login.html");
    exit();
}

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "contact_db";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all contact form submissions
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard - Contact Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center mb-4">Admin Dashboard - Contact Submissions</h2>

    <a href="download_csv.php" class="btn btn-success mb-3">Download as CSV</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                
                <th>Message</th>
                
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        
                        <td><?= htmlspecialchars($row['message']) ?></td>
                        
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6" class="text-center">No records found</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>
</body>
</html>

<?php
$conn->close();
?>
