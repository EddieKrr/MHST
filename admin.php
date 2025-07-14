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
    <?php include 'header.php';?>
</head>
<body>
    <h2>Existing Users</h2>
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
    <div class="form-container" id="editUserContainer" style="display:none;">
        <h2>Edit User</h2>
        <form id="editUserForm">
            <input type="hidden" name="id" id="editId"> <label for="editName">Name:</label>
            <input type="text" name="name" id="editName" required>
            <label for="editEmail">Email:</label>
            <input type="email" name="email" id="editEmail" required>
            <label for="editPassword">New Password (leave blank to keep current):</label>
            <input type="password" name="password" id="editPassword">
            <label for="editAge">Age:</label>
            <input type="number" name="age" id="editAge">
            <label for="editGender">Gender:</label>
            <input type="text" name="gender" id="editGender" required>
            <label for="editRole">Role:</label>
            <input type="text" name="role" id="editRole" required>
            <button type="submit">Update User</button>
            <button type="button" id="cancelEdit">Cancel</button>
        </form>
    </div>
    <?php include 'footer.php';?>
    </body>
</html>