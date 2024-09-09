<?php
// Include the database connection
require_once '../../includes/db.php';

// Process registration
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agency_name = $_POST['agency_name'];
    $contact_person = $_POST['contact_person'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    
    $passwordEnc = password_hash($pass, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO agencies (agency_name, contact_person, email, phone, passwords) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $agency_name, $contact_person, $email, $phone, $passwordEnc);
    
    if ($stmt->execute()) {
        header("Location: ../../index.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
