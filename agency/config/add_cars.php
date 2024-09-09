<?php
session_start();

// Include the database connection
require_once '../../includes/db.php';

// Process registration
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_name = $_POST['car_name'];
    $descr = $_POST['descr'];
    $car_num = $_POST['car_num'];
    $seats = $_POST['seats'];
    $cost = $_POST['cost'];
    $image = $_POST['image'];
    $book = 0; // Boolean value represented as an integer
    
    // Add for logged-in agency
    $agency = $_SESSION['id'];

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO vehicles (VehicleModel, VehicleNumber, SeatingCapacity, RentPerDay, images, book, descr, agency) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters
    if (!$stmt->bind_param("ssidsiss", $car_name, $car_num, $seats, $cost, $image, $book, $descr, $agency)) {
        die('Bind failed: ' . htmlspecialchars($stmt->error));
    }

    if ($stmt->execute()) {
        header("Location: ../agency.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
