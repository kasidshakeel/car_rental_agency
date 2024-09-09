<?php

?>
 <!-- Bootstrap CSS -->
 <link href="../css/style.css" rel="stylesheet">

 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../agency/agency.php"><b><i>CarRentalAgency</i></b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="available.php">Vehicles For Rent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bookings.php">Booked Vehicles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_vehicle.php">Add New Vehicles</a>
                </li>
            <?php
                // Check if the user is logged in.
                if (isset($_SESSION['agency_name'])) {
            ?>    
                <li class="nav-item">
                    <button class="badge badge-danger" style="margin:10px 0px" disabled><?php echo htmlspecialchars($_SESSION['agency_name']); ?></button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../includes/logout.php">Logout</a>
                </li>
            
            <?php
                }
            ?>
            </ul>
        </div>
    </nav>

<!-- Bootstrap JS and dependencies -->
    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>