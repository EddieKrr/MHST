<?php
header ("Content-Type: apllication/json");
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $conn->real_escape_string($_POST["name"]);
    $email    = $conn->real_escape_string($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $age      = intval($_POST["age"]);
    $gender   = $conn->real_escape_string($_POST["gender"]);
    $role     = 'user';

     if ($age<18) {
        echo json_encode([
            "success" => true,
            "message" => "You must be at least 18 years old to register."
        ]);
        exit();	
    }

     try {
        $sql = "INSERT INTO users (name, email, password, age, gender, role)
                VALUES ('$name', '$email', '$password', $age, '$gender', '$role')";

        $conn->query($sql);

        
        echo json_encode([
            "success" => true,
            "message" => "Registration successful!"
        ]);
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            
            echo json_encode([
                "success" => false,
                "message" => "This email is already registered. Please use another."
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Error: " . $e->getMessage()
            ]);
        }
    }
}
?>
