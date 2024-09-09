<?php
// Include the database connection
require_once 'db.php';
session_start();

// Process booking
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // By Form
    $car_name = $_POST['car_name'];
    $car_num = $_POST['car_num'];
    $cust_name = $_POST['cust_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $duration = $_POST['duration'];

    // Car info
    $car_sql = "SELECT * FROM vehicles WHERE VehicleNumber=?";
    $stmt_car = $conn->prepare($car_sql);
    $stmt_car->bind_param("s", $car_num);
    $stmt_car->execute();
    $result_car = $stmt_car->get_result();
    if ($result_car->num_rows > 0) {
        $row_car = $result_car->fetch_assoc();
        $vehicle_id = $row_car['VehicleID'];
        $seats = $row_car['SeatingCapacity'];
        $cost = $row_car['RentPerDay'];
        $descr = $row_car['descr'];
        $images = $row_car['images'];
        $agency = $row_car['agency'];
    } else {
        echo "Car not found.";
        exit;
    }

    // Update book column
    $vehicle_update = "UPDATE vehicles SET book = 1 WHERE VehicleID = ?";
    $stmt_update = $conn->prepare($vehicle_update);
    $stmt_update->bind_param("i", $vehicle_id); // Use 'i' for integer
    $stmt_update->execute();

    // Customer info (assuming customer_id is not part of the form but might be stored in session)
    // If you need customer ID, ensure it's retrieved correctly.
    $cust_id = $_POST['cust_id']; // Example: Ensure this is set appropriately

    // Agency info
    $agency_sql = "SELECT * FROM agencies WHERE id=?";
    $stmt_agency = $conn->prepare($agency_sql);
    $stmt_agency->bind_param("i", $agency);
    $stmt_agency->execute();
    $result_agency = $stmt_agency->get_result();
    if ($result_agency->num_rows > 0) {
        $row_agency = $result_agency->fetch_assoc();
        $agency_name = $row_agency['agency_name'];
        $contact_person = $row_agency['contact_person'];
    } else {
        echo "Agency not found.";
        exit;
    }

    // Insert booking
    $sql = "INSERT INTO booking (customer_id, customer_name, customer_email, customer_phone, agency_name, contact_person, images, car_name, car_number, seats, cost, duration, descr) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ississsssidss", $cust_id, $cust_name, $email, $phone, $agency_name, $contact_person, $images, $car_name, $car_num, $seats, $cost, $duration, $descr);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $stmt_car->close();
    $stmt_agency->close();
}

$conn->close();
?>