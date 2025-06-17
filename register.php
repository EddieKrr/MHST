<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $conn->real_escape_string($_POST["name"]);
    $email    = $conn->real_escape_string($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $age      = intval($_POST["age"]);
    $gender   = $conn->real_escape_string($_POST["gender"]);
    $role     = 'user';

    $sql = "INSERT INTO users (name, email, password, age, gender, role)
            VALUES ('$name', '$email', '$password', $age, '$gender', '$role')";

    if ($conn->query($sql)) {
        echo "Registration successful.";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
