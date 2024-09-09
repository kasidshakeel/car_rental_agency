<?php
session_start();
require_once('../../includes/db.php');

// Check if the vehicle ID is provided
if (!isset($_GET['id'])) {
    echo "Vehicle ID not provided.";
    exit;
}

$vehicleId = intval($_GET['id']);
$query = "SELECT * FROM vehicles WHERE VehicleID = $vehicleId";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "Vehicle not found.";
    exit;
}

$vehicle = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vehicle</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'Nav-bar.php'; ?>

<div class="container mt-5">
    <h2>Edit Vehicle Details</h2>
    <form action="../config/update_cars.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $vehicle['VehicleID']; ?>">

        <div class="form-group">
            <label for="VehicleModel">Vehicle Model:</label>
            <input type="text" class="form-control" id="VehicleModel" name="VehicleModel" value="<?php echo htmlspecialchars($vehicle['VehicleModel']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="VehicleNumber">Vehicle Number:</label>
            <input type="text" class="form-control" id="VehicleNumber" name="VehicleNumber" value="<?php echo htmlspecialchars($vehicle['VehicleNumber']); ?>" required>
        </div>

        <div class="form-group">
            <label for="SeatingCapacity">Seating Capacity:</label>
            <input type="number" class="form-control" id="SeatingCapacity" name="SeatingCapacity" value="<?php echo htmlspecialchars($vehicle['SeatingCapacity']); ?>" required>
        </div>

        <div class="form-group">
            <label for="RentPerDay">Rent Per Day:</label>
            <input type="number" step="0.01" class="form-control" id="RentPerDay" name="RentPerDay" value="<?php echo htmlspecialchars($vehicle['RentPerDay']); ?>" required>
        </div>

        <div class="form-group">
            <label for="descr">Description:</label>
            <textarea class="form-control" id="descr" name="descr" rows="3" required><?php echo htmlspecialchars($vehicle['descr']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="images">Image:</label>
            <input type="file" class="form-control-file" id="images" name="images">
            <img src="image/<?php echo $vehicle['images']; ?>" alt="Current Image" width="150">
        </div>

        <button type="submit" class="btn btn-primary">Update Vehicle</button>
    </form>
</div>

<?php include 'footer.php'; ?>

<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
