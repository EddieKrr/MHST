<?php

require_once 'db.php';
header('Content-Type: application/json');

$response = [ 'success' => false, 'message' => '' ];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $name = isset($data['name']) ? trim($data['name']) : '';
    $email = isset($data['email']) ? trim($data['email']) : '';
    $password = isset($data['password']) ? trim($data['password']) : '';
    $age = isset($data['age']) ? intval($data['age']) : 0;
    $gender = isset($data['gender']) ? trim($data['gender']) : '';
    $role = isset($data['role']) ? trim($data['role']) : 'user';

    if (empty($name) || empty($email) || empty($password) || empty($gender)){
        $response['message'] = 'Please fill in all required fields.';
        echo json_encode($response);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $response['message'] = 'Invalid email format.';
        echo json_encode($response);
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, age, gender, role) VALUES (?, ?, ?, ?, ?, ?)");

    if ($stmt === false){
        $response['message'] = 'Database prepare error: ' . $conn->error;
        echo json_encode($response);
        exit();
    }

    if ($stmt -> execute()){
        $response['success'] = true;
        $response['message'] = 'User created successfully.';
    } else {
        if ($conn->errno === 1062) {
            $response['message'] = 'This email is already registered. Please use another.';
        } else {
            $response['message'] = 'Error: ' . $conn->error;
        }
    }
 
    $stmt->close();
    $conn->close();

} else {
    $response['message'] = 'Invalid request method.';
}
echo json_encode($response);
?>