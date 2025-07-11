<?php
require_once 'db.php'; // Include your database connection file
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $id = isset($data['id']) ? intval($data['id']) : 0;

    if ($id <= 0) {
        $response['message'] = 'Invalid user ID provided.';
        echo json_encode($response);
        exit();
    }

    try {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        if ($stmt === false) {
            throw new Exception('Database prepare error: ' . $conn->error);
        }

        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $response['success'] = true;
                $response['message'] = 'User deleted successfully.';
            } else {
                $response['message'] = 'User not found with ID: ' . $id . ' or no changes were made.';
            }
        } else { // Correctly matched else for $stmt->execute()
            throw new Exception('Failed to delete user: ' . $stmt->error);
        }
    } catch (Exception $e) {
        $response['message'] = 'An error occurred: ' . $e->getMessage();
    } finally {
        if (isset($stmt)) {
            $stmt->close();
        }
        $conn->close();
    }
} else { // Correctly matched else for $_SERVER['REQUEST_METHOD'] === 'POST'
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>