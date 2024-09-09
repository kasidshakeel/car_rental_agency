<?php
    session_start();
    require_once("../../includes/db.php");

    // Check if the vehicle ID is provided
    if (!isset($_GET['id'])) {
        echo "Vehicle ID not provided.";
        exit;
    }
    // Fetch the Vehicle name and number
    $vehicleId = intval($_GET['id']);
    $car = "SELECT VehicleModel, VehicleNumber FROM vehicles WHERE VehicleID = '$vehicleId'";
    $result = mysqli_query($conn, $car);
    
    if (mysqli_num_rows($result) == 0) {
        echo "Vehicle not found.";
        exit;
    }
    $vehicle = mysqli_fetch_assoc($result);
    $vehicleName = $vehicle['VehicleModel'];
    $vehicleNumber = $vehicle['VehicleNumber'];

    // Get the details from Booking
    $booking = "SELECT * FROM booking WHERE car_name = '$vehicleName' && car_number = '$vehicleNumber'";
    $booking_result = mysqli_query($conn, $booking);

    $booking_details = mysqli_fetch_assoc($booking_result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    
    <link rel="stylesheet" href="../css/check.css">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Bootstrap JS and dependencies -->
    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Booking Details</h1>
        <div class="card card-body">
            <h2>Customer Information</h2>
            <p><strong>Booking ID:</strong> <span id="booking_id" hidden>123456</span></p>
            <p><strong>Customer ID:</strong> <span id="customer_id"><?php echo $booking_details['customer_id']; ?></span></p>
            <p><strong>Customer Name:</strong> <span id="customer_name"><?php echo $booking_details['customer_name']; ?></span></p>
            <p><strong>Customer Email:</strong> <span id="customer_email"><?php echo $booking_details['customer_email']; ?></span></p>
            <p><strong>Customer Phone:</strong> <span id="customer_phone"><?php echo $booking_details['customer_phone']; ?></span></p>
        </div>
        <div class="card">
            <h2>Agency Information</h2>
            <p><strong>Agency Name:</strong> <span id="agency_name"><?php echo $booking_details['agency_name']; ?></span></p>
            <p><strong>Contact Person:</strong> <span id="contact_person"><?php echo $booking_details['contact_person']; ?></span></p>
        </div>
        <div class="card">
            <h2>Car Details</h2>
            <p><strong>Car Name:</strong> <span id="car_name"><?php echo $booking_details['car_name']; ?></span></p>
            <p><strong>Car Number:</strong> <span id="car_number"><?php echo $booking_details['car_number']; ?></span></p>
            <p><strong>Seats:</strong> <span id="seats"><?php echo $booking_details['seats']; ?></span></p>
            <p><strong>Cost:</strong> <span id="cost"><?php echo $booking_details['cost']; ?></span></p>
            <p><strong>Duration:</strong> <span id="duration"><?php echo $booking_details['duration']; ?></span></p>
            <p><strong>Description:</strong> <span id="descr"><?php echo $booking_details['descr']; ?></span></p>
        </div>
        <div class="card">
            <h2>Images</h2>
            <img id="images" src="<?php $booking_details['images']; ?>" alt="Car Image">
        </div>
    </div>
</body>
</html>
