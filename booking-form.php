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
            <h1><i>Book Your Car</i></h1>
            <p>You are close to get start your journey.</p>
        </div>
    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="includes/book_car.php" method="post">
                <table>
                    <tr>
                        <th>
                            <div class="form-group">
                                <label for="cust_name">Full Name</label>
                                <input type="text" class="form-control" id="cust_name" name="cust_name" required>
                            </div>
                        </th>
                        <th>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </th>
                    </tr>

                    <tr>
                        <th>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" required>                    
                            </div>
                        </th>

                        <th>
                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input type="text" class="form-control" id="duration" name="duration" required>
                            </div>
                        </th>
                    </tr>

                <div class="form-group">
                <?php 
                    if (isset($_GET['id']) && isset($_GET['car_name']) && isset($_GET['car_number'])) {
                        $car_id = htmlspecialchars($_GET['id']);
                        $car_name = htmlspecialchars($_GET['car_name']);
                        $car_number = htmlspecialchars($_GET['car_number']);
                        $_SESSION['car_id'] = $car_id;
                        $_SESSION['car_name'] = $car_name;
                        $_SESSION['car_number'] = $car_number;
                    ?>
                    <label name="car_name"><b>Car: <?php echo $car_name; ?></b></label><br>
                    <label name="car_num"><b>Number: <?php echo $car_number; ?></b></label>
                    <input type="hidden" name="car_name" value="<?php echo $car_name; ?>">
                    <input type="hidden" name="car_num" value="<?php echo $car_number; ?>">
                    <input type="hidden" name="cust_id" value="<?php echo $_SESSION['id']; ?>">
                    <?php } ?>
                </div>

                </table>
                <button type="submit" class="btn btn-outline-success">Book</button>
            </form>
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
