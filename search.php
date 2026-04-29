<?php
$conn = new mysqli("localhost", "drew", "yourpassword", "student_directory");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$lname = $_POST['lastname'] ?? '';

$stmt = $conn->prepare("CALL search_students(?)");
$stmt->bind_param("s", $lname);
$stmt->execute();

$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Your Inquiry Results</title>
<link rel="stylesheet" href="styles/main.css">
<script src="scripts/main.js" defer></script>
</head>
<body>

<h1>Inquiry Results</h1>

<a href="index.php">Return to Home</a>

<?php if ($result && $result->num_rows > 0): ?>

<table>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
<td><?php echo htmlspecialchars($row['id']); ?></td>
<td><?php echo htmlspecialchars($row['first_name']); ?></td>
<td><?php echo htmlspecialchars($row['last_name']); ?></td>
<td><?php echo htmlspecialchars($row['email']); ?></td>
</tr>
<?php endwhile; ?>

</table>

<?php else: ?>

<p>No students by that name.</p>

<?php endif; ?>

<?php
$stmt->close();
$conn->close();
?>

</body>
</html>
