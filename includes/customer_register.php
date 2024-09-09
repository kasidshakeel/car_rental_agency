<?php
// Include the database connection
require_once 'db.php';

// Process registration
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    
    $passwordEnc = password_hash($pass, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO customers (full_name, email, phone, passwords) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $full_name, $email, $phone, $passwordEnc);
    
    if ($stmt->execute()) {
        header("Location: ../index.php");
        //echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
