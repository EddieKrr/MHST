<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $conn->real_escape_string($_POST["name"]);
    $email    = $conn->real_escape_string($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $age      = intval($_POST["age"]);
    $gender   = $conn->real_escape_string($_POST["gender"]);
    $role     = 'user';

     if ($age<18) {
        echo "<script>alert('You must be at least 18 years old to register.'); window.location.href = 'signin.html';</script>";
        exit();	
    }

     try {
        $sql = "INSERT INTO users (name, email, password, age, gender, role)
                VALUES ('$name', '$email', '$password', $age, '$gender', '$role')";

        $conn->query($sql);

        
        echo "<script>alert('Registration successful!'); window.location.href = 'signin.html';</script>";
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            
            echo "<script>alert('This email is already registered. Please use another.'); window.location.href = 'signin.html';</script>";
        } else {
            
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
    }
}
?>
