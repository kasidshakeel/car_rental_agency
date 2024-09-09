<?php
session_start();
require_once('includes/db.php');
$sql = "select * from agencies";
$result = mysqli_query($conn, $sql);

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
        <?php
            if ($result != null) {
                while ($row = mysqli_fetch_assoc($result)) { 
        ?>
            <div class="col-md-6">
                <div class="card mdb-color lighten-2 text-center z-depth-2">
                    <div class="card-body bg-dark text-white">
                        <a href="#">
                            <img class="img-responsive card-img-top" src="image/agency-services.jpg" alt="Card image cap">  
                        </a>
                        <h3 align = "left" class="white-text mb-2"><b>Agency Name : <?php echo $row['agency_name']; ?></b></h3>
                        <h5 align= "left">Agency Dealer : <?php echo $row['contact_person']; ?></h5>
                        <p align= "left">Agency Contact : <?php echo $row['phone']; ?></p>
                        <p align= "left">Agency Email : <?php echo $row['email']; ?></p>
                        
                    </div>
                </div>
            </div>
        <?php
                }
        }
        ?>
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
