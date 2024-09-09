<?php
session_start(); // Start the session to access session variables
require_once('includes/db.php'); // Include the database connection file

// Check if 'id' exists in the session
if (isset($_SESSION['id'])) {
    // Sanitize and store the customer ID from the session
    $cust_id = $_SESSION['id'];
    
    // Prepare the SQL query with a placeholder
    $query = "SELECT * FROM booking WHERE customer_id = ?";
    
    // Initialize the prepared statement
    if ($stmt = mysqli_prepare($conn, $query)) {
        // Bind the customer ID to the prepared statement
        mysqli_stmt_bind_param($stmt, "i", $cust_id); // Assuming customer_id is an integer
        
        // Execute the statement
        mysqli_stmt_execute($stmt);
        
        // Get the result of the query
        $result = mysqli_stmt_get_result($stmt);
    } else {
        echo "Failed to prepare the SQL statement.";
    }
} else {
    echo "Customer ID is not set in the session.";
}
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
            <h1><i>My Bookings</i></h1>
            <p>List of Rented Cars.</p>
        </div>
    </div>

    <?php
    if ($result != null) {
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)) { 
        ?>
    <div class="container cont-items">
        <div class="row">
            <div class="col">
                <div class="card items">
                    <img class="img-responsive card-img-top" src="<?php echo $row['images']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><?php echo $row['descr']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark text-white"><?php echo $row['car_name']; ?></li>
                        <li class="list-group-item"><?php echo $row['car_number']; ?> Number</li>
                        <li class="list-group-item"><?php echo $row['seats']; ?> Seats</li>
                        <li class="list-group-item"><?php echo $row['cost']; ?> Per/Day</li>
                        <li class="list-group-item"><?php echo $row['duration']; ?> Duration</li>
                    </ul>
                    <div class="card-body">
                        <a href="includes/book.php?id=<?php echo $row['booking_id']; ?>" class="card-link btn btn-outline-danger">Return Car</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  
            }
        }
        else {
            echo "<h2 align='center' style='color:red'> You Have Not Booked Any Car </h2>";
        }
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
