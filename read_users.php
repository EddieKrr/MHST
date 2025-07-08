<?php

require_once 'db.php';
header('Content-Type: Application/json');
$users = array();//Array 2 store user data

if($conn->connect_error) {
    echo json_encode(['error'=>'Database connection failed: ' .  $conn-> connect_error]);
    exit();
}

try {
    $sql = "SELECT id, name, email, role, age, gender FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //Lopping through all ninis in the result set
        while ($row = $result->fetch_assoc()) {
            $users[] = $row; //Add each user to the array
        }
        $result->free();  //free mem space
    } else {
        echo json_encode(['error'=> 'Query failed: ' . $conn->error]);
        exit();
    }
    } catch (Exception $e) {
        echo json_encode(['error'=> ' An unexpected error occurred: ' . $e->getMessage()]);
        exit();
    } finally {
        $conn -> close();
    }
     
    echo json_encode($users); //Converting to JSON x output

    ?>
  

