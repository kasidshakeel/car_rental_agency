<?php
    session_start();
    
    $agency_id = $_SESSION['id'];

    require_once('../includes/db.php');
    $query = "select * from vehicles where book = 1 && agency='$agency_id'";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Agency</title>
    <!-- Bootstrap CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Custom CSS (Optional) -->
    <style>
        .welcome-section {
            padding: 60px 0;
            text-align: center;
        }
        .brand-name {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .cont-items {
            width: 1170px;
            flex-wrap: wrap;
            justify-content: space-around;
            display: flex;
        }

        .items {
            flex-basis: 23%;
            margin: 10px 0px;
        }

        .card-img-top{
            width:100%;
            height:100%;
            object-fit: cover;
        }

    </style>
</head>
<body>
    
    <!-- Navbar Section -->
    <?php include 'layouts/Nav-bar.php'; ?>
    <hr>

    <!-- Welcome Section -->
    <div align="center">
        <img src="image/booked1.jpg" class="img-fluid" alt="Responsive image">
    </div>
    <div class="welcome-section">
        <div class="container">
            <h1><i>Your Booked Vehicle</i></h1>
            <p>List of Your Booked Cars. Check and Update the Cars Info!</p>
        </div>
    </div>
    <?php
    if ($result != null) {
        while ($row = mysqli_fetch_assoc($result)) { 
        ?>
    <div class="container cont-items">
        <div class="row">
            <div class="col">
                <div class="card items">
                    <img class="card-img-top" src="<?php echo $row['images']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><?php echo $row['descr']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark text-white"><?php echo $row['VehicleModel']; ?></li>
                        <li class="list-group-item"><?php echo $row['VehicleNumber']; ?> Number</li>
                        <li class="list-group-item"><?php echo $row['SeatingCapacity']; ?> Seats</li>
                        <li class="list-group-item"><?php echo $row['RentPerDay']; ?> Per/Day</li>
                    </ul>
                    <div class="card-body">
                    <a href="layouts/edit_vehicle.php?id=<?php echo $row['VehicleID']; ?>" class="card-link btn btn-outline-warning">Edit Details</a>
                        <?php
                        if ($row['book'] == 1) { ?>
                            <a href="layouts/customer_details.php?id=<?php echo $row['VehicleID']; ?>" class="card-link btn btn-outline-info">Check Booking</a>
                        <?php
                        }
                        else {?>
                            <button class="card-link btn btn-outline-success" disabled>Available</button>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  
        }
    }
    else {
        echo "<h2 align='center' style='color:red'> No Cars Booked </h2>";
    
    }
    ?>

    <hr>

    <!-- Footer Section -->
    <?php include 'layouts/footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
