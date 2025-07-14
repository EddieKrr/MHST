<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION["name"])) {
    header("Location: signin.html");
    exit();
}

// Check if user has admin role
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    // Redirect to unauthorized page or show error
    header("Location: unauthorized.php");
    exit();
}
?>


