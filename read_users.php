<?php
header("Content-Type: application/json");
include 'db.php'; 
$result = $conn->query("SELECT 'id','name', 'email','role','age','gender' FROM users");
echo json_encode($result->fetch_all(MYSQLI_ASSOC));
?>