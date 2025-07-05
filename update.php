<?php include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $id = intval($_POST['id']); // This is young_adult_id
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE young_adult SET full_name = ?, age = ?, email = ?, password = ? WHERE young_adult_id = ?");
    $stmt->bind_param("sissi", $full_name, $age, $email, $password, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>