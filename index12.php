<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="CSS/body.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <?php include 'header.php'; ?>  
    <?php include 'db.php'; ?>

    <!-- <div class="container">
        
    <h2>Add new young adult</h2>
    <form action="create.php" method="POST">
        Full Name: <input type="text" name="full_name" required><br>
        Age: <input type="number" name="age" required><br>
        Email: <input type="email" name="email" required><br>
        Gender: 
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
</select><br>
<button type="submit">Add user</button>
    </form>

    <h2>Young Adults List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Age</th>
            <th>Email</th>
            <th> Gender</th>
            <th>Actions</th>
        </tr>
        <?php
        $result =$conn->query("SELECT * FROM young_adult");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['email']}</td>
<td> 
            <a href= 'edit_young_adult.php?id={$row['id']}'>Edit</a> |
            <a href='delete_young_adult.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
            </td>
            </tr>";
        }
        ?>
    </table>
    </div>

     -->
    <?php include 'footer.php'; ?>
</body>
</html>