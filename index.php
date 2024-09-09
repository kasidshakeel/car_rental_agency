<?php
// index.php
session_start();
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
    </style>
</head>
<body>
    
    <!-- Navbar Section -->
    <?php include 'layouts/Nav-bar.php'; ?>

    <!-- Welcome Section -->
    <div align="center">
        <img src="image/car-rental.jpg" class="img-fluid" alt="Responsive image">
    </div>
    <hr>
    <div class="welcome-section">
        <div class="container">
            <h1>Welcome to Car Rental Agency</h1>
            <p>Your adventure begins here. Find the perfect car for your next journey!</p>
            <p><i>See our Services</i></p>
        </div>
    </div>
    <div align="center" class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mdb-color lighten-2 text-center z-depth-2">
                    <div class="card-body bg-dark text-white">
                        <a href="available.php">
                            <img class="img-responsive card-img-top" src="image/agency-services.jpg" alt="Card image cap">
                            <p class="white-text mb-0"><i><b>Rental Vehicles</b></i></p>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card mdb-color lighten-2 text-center z-depth-2">
                    <div class="card-body bg-dark text-white">
                        <a href="agencies.php">
                        <img class="img-responsive card-img-top" src="image/rent-services.jpg" alt="Card image cap">
                        <p class="white-text mb-0"><i><b>Rent Agencies</a></b></i></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Section -->
    <?php include 'layouts/footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
