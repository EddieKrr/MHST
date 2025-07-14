<?php
// admin_check.php - Include this file at the top of admin-only pages
session_start();

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

<?php
// Example: admin_dashboard.php - An admin-only page
include 'admin_check.php'; // This will check admin access
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="CSS/body.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>!</p>
    <p>This page is only accessible to administrators.</p>
    
    <!-- Admin-only content here -->
    <div class="admin-content">
        <h2>Admin Functions</h2>
        <ul>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="view_reports.php">View Reports</a></li>
            <li><a href="system_settings.php">System Settings</a></li>
        </ul>
    </div>
</body>
</html>
