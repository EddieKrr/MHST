<?php
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: signin.html");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <link rel="stylesheet" href="CSS/body.css">
</head>
<body>
    <div class="error-container">
        <h1>Access Denied</h1>
        <p>You don't have permission to access this page.</p>
        <p>This page is restricted to administrators only.</p>
        <a href="index.php" class="button">Go Back to Home</a>
    </div>
</body>
</html>