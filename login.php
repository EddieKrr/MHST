<?php
header("Content-Type: application/json");
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $password = $_POST["password"];

    $result = $conn->query("SELECT * FROM users WHERE name = '$name'");

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["role"] = $user["role"];

            header("Content-Type: application/json");
            echo json_encode([
                "success" => true,
                "message" => "Login successful."
            ]);
            exit();
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Invalid password."
            ]);
        }
    } else {
        echo json_encode([
            "success" => false,
            "message" => "User not found."
        ]);
    }

    $conn->close();
}
?>
