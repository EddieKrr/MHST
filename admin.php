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
    <link rel="stylesheet" href="CSS/admin.css">
    <script src="JS/admin.js" defer></script>
    <title>Admin Page</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tbody"></tbody>
    </table>

    <form id="addUser">
        <input type="text" placeholder="Name" name="name" id="name" required>
        <input type="email" placeholder="Email" name="email" id="email" required>
        <input type="password" placeholder="Password" name="password" id="password" required>
        <input type="number" placeholder="Age" name="age" id="age" required>
        <input type="text" placeholder="Gender" name="gender" id="gender" required>
        <input type="text" placeholder="Role" name="role" id="role">
        <button type="submit">Add User</button>
    </form>
</body>
</html>