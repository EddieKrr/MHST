<?php
header('Content-Type: application/json');

require_once 'db.php'; 

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || empty($data['id'])) {
    echo json_encode(['success' => false, 'message' => 'User ID is required.']);
    exit;
}

$id = intval($data['id']);
$name = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');
$age = isset($data['age']) ? intval($data['age']) : null;
$gender = trim($data['gender'] ?? '');
$role = trim($data['role'] ?? '');
$password = trim($data['password'] ?? '');

// Basic validation
if (!$name || !$email || !$gender || !$role) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields.']);
    exit;
}

// Check if user exists
$checkStmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
$checkStmt->bind_param("i", $id);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => "User not found with ID: $id"]);
    exit;
}

// Construct query dynamically based on provided fields
$fields = "name = ?, email = ?, age = ?, gender = ?, role = ?";
$params = [$name, $email, $age, $gender, $role];
$types = "ssiss";

if (!empty($password)) {
    $fields .= ", password = ?";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $params[] = $hashedPassword;
    $types .= "s";
}

$params[] = $id;
$types .= "i";

$sql = "UPDATE users SET $fields WHERE id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param($types, ...$params);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(['success' => true, 'message' => 'User updated successfully.']);
} else {
    echo json_encode(['success' => true, 'message' => 'No changes made — data is the same.']);
}

$stmt->close();
$conn->close();
?>
