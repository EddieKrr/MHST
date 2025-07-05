<?php
include 'db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: ID not provided.");
}

$id = intval($_GET['id']); // cast to integer for security

// Corrected: Use young_adult_id instead of id
$result = $conn->query("SELECT * FROM young_adult WHERE young_adult_id = $id");

if (!$result || $result->num_rows === 0) {
    die("Error: No record found with that ID.");
}

$row = $result->fetch_assoc();
?>

<h2>Edit Young Adult</h2>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['young_adult_id'] ?>">
    
    Full Name: <input type="text" name="full_name" value="<?= htmlspecialchars($row['full_name']) ?>" required><br>
    
    Age: <input type="number" name="age" value="<?= $row['age'] ?>" required><br>
    
    Email: <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required><br>
    
    Password: <input type="password" name="password" value="<?= htmlspecialchars($row['password']) ?>" required><br>
    
    <button type="submit">Update</button>
</form>

<a href="index.php">Cancel</a>
