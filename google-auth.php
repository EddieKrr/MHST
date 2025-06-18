<?php
require_once 'vendor/autoload.php';
require 'db.php';

session_start();

$input = json_decode(file_get_contents('php://input'), true);
$token = $input['credential'] ?? null;

if (!$token) {
    http_response_code(400);
    echo "Missing credential";
    exit();
}

$client = new \Google_Client(['client_id' => '765942851096-fgiq7j6e720f684s2i6dcvub3p6pipsd.apps.googleusercontent.com']);
$payload = $client->verifyIdToken($token);

if ($payload) {
    $name = $conn->real_escape_string($payload['name']);
    $email = $conn->real_escape_string($payload['email']);
    $role = 'user';

    // Check if user exists
    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows === 0) {
        // Auto-register
        $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '', '$role')");
        $user_id = $conn->insert_id;
    } else {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
        $name = $user['name'];
    }

    // Start session
    $_SESSION["user_id"] = $user_id;
    $_SESSION["name"] = $name;
    $_SESSION["role"] = $role;

    echo "success";
} else {
    http_response_code(401);
    echo "Invalid token";
}
