<?php include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $stmt = $conn->prepare("INSERT INTO young_adult (full_name, age, email, gender) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $full_name, $age, $email, $gender);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

