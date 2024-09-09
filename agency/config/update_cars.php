<?php
session_start();
require_once('../../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $VehicleModel = mysqli_real_escape_string($conn, $_POST['VehicleModel']);
    $VehicleNumber = mysqli_real_escape_string($conn, $_POST['VehicleNumber']);
    $SeatingCapacity = intval($_POST['SeatingCapacity']);
    $RentPerDay = floatval($_POST['RentPerDay']);
    $descr = mysqli_real_escape_string($conn, $_POST['descr']);

    $query = "UPDATE vehicles SET VehicleModel='$VehicleModel', VehicleNumber='$VehicleNumber', SeatingCapacity='$SeatingCapacity', RentPerDay='$RentPerDay', descr='$descr' WHERE VehicleID='$id'";
    mysqli_query($conn, $query);

    if (isset($_FILES['images']) && $_FILES['images']['error'] == 0) {
        $imageName = $_FILES['images']['name'];
        $imageTmpName = $_FILES['images']['tmp_name'];
        move_uploaded_file($imageTmpName, "../image/" . $imageName);

        $query = "UPDATE vehicles SET images='$imageName' WHERE VehicleID='$id'";
        mysqli_query($conn, $query);
    }
    // Redirect to the vehicle listing page
    header("Location: ../agency.php");
    exit();
}
