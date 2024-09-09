<?php
//session_start(); // Uncomment this to start the session
?>

<link href="css/styles.css" rel="stylesheet">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><b><i>CarRentalAgency</i></b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="available.php">Vehicles Rent</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="agencies.php">Agencies</a>
            </li>
            <?php
                // Check if the user is logged in.
                if (isset($_SESSION['full_name'])) {
            ?>    
            <li class="nav-item">
                <a href="booking.php" class="nav-link btn-outline-alert">Booked Vehicles</a>
            </li>
            <li class="nav-item">
                <button class="badge badge-danger" style="margin:10px 0px" disabled><?php echo htmlspecialchars($_SESSION['full_name']); ?></button>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="includes/logout.php">Logout</a>
            </li>
            
            <?php
                } else {
            ?>
            <li class="nav-item">
                <button class="nav-link btn btn-outline-alert" disabled>Booked Vehicles</button>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <button id="registerLink" class="nav-link btn btn-outline-alert">Register</button>
            </li>
            <?php
                }
            ?>
        </ul>
    </div>
</nav>

<!-- Modal -->
<div id="registerModal" class="modal">
    <div class="modal-content bg-dark text-white">
        <span class="close">&times;</span>
        <h2 align="center">Register As</h2>
        <a href="register_customer.php" class="btn modal-button">Customer</a>
        <a href="register_agency.php" class="btn modal-button">Agency</a>
    </div>
</div>

<script src="js/script.js"></script>

<!-- Bootstrap JS and dependencies -->
<script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.min.js"></script>
