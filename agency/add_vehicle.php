<?php
session_start();
    
?>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .welcome-section {
            padding: 10px 0;
            text-align: center;
        }
        .brand-name {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .car{
            margin-top: 10px;
            padding-top: 15px;
            border: 2px solid lightgreen;
            border-radius: 10px;
        }
    </style>
<body>
    <!-- Navbar Section -->
    <?php include 'layouts/Nav-bar.php'; ?>
    <hr>
    <div align="center">
            <img src="image/new_vehicle.jpg" class="img-fluid" alt="Responsive image" width="80%">
        </div>
        <div class="welcome-section">
            <div class="container">
                <h1><i>Add Yours Vehicles</i></h1>
        </div>
    </div>
    <div class="container car">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="config/add_cars.php" method="post">
                    <div class="form-group">
                        <label for="car_name">Vehicle Model</label>
                        <input type="text" class="form-control" id="car_name" name="car_name" required>
                    </div>
                    <div class="form-group">
                        <label for="descr">Description</label>
                        <input type="text" class="form-control" id="descr" name="descr" required>
                    </div>
                    <div class="form-group">
                        <label for="car_num">Vehicle Number</label>
                        <input type="text" class="form-control" id="car_num" name="car_num" required>
                    </div>
                    <div class="form-group">
                        <label for="seats">Seating Capacity</label>
                        <input type="text" class="form-control" id="seats" name="seats" required>
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost Per/Day</label>
                        <input type="text" class="form-control" id="cost" name="cost" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Add</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>    
    <hr>

    <!-- Footer Section -->
    <?php include 'layouts/footer.php'; ?>
</body>
