<?php
?>
    <!-- Bootstrap CSS -->
    <link href="css/style.css" rel="stylesheet">
    
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
    </style>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Login</h2>
                <form action="includes/login.php" method="post">
                    <hr>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="user_type">Login As</label>
                        <select class="form-control" id="user_type" name="user_type" required>
                            <option value="" disabled selected>Select User Type</option>
                            <option value="customer">Customer</option>
                            <option value="agency">Agency</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Login</button>
                    <hr>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
