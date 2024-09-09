<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// login.php
session_start();

// Include the database connection
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $user_type = $_POST['user_type'];

    if ($user_type == "customer") {
        // Prepare the SQL statement
        $sql = "SELECT * FROM customers WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            // Bind the email parameter
            mysqli_stmt_bind_param($stmt, 's', $email);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Get the result
            $result = mysqli_stmt_get_result($stmt);

            // Fetch the result row
            $row = mysqli_fetch_assoc($result);

            // Check if a row was returned and password is correct
            if ($row && password_verify($pass, $row['passwords'])) {
                // Start the session and set the session variable
                session_start();

                // Example session assignment
                $_SESSION['id'] = $row['id'];
                $_SESSION['full_name'] = $row['full_name'];
                
                // Redirect to index.php in the parent directory
                header("Location: ../index.php");
                exit();
            }

            else {
                echo "Invalid email or password.";
            }
            // Close the statement
            mysqli_stmt_close($stmt);
        } 
        else {
            echo "Failed to prepare the SQL statement.";
        }
    }
    
    else if ($user_type == "agency"){
        // Prepare the SQL statement
        $sql = "SELECT * FROM agencies WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            // Bind the email parameter
            mysqli_stmt_bind_param($stmt, 's', $email);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Get the result
            $result = mysqli_stmt_get_result($stmt);

            // Fetch the result row
            $row = mysqli_fetch_assoc($result);

            // Check if a row was returned and password is correct
            if ($row && password_verify($pass, $row['passwords'])) {
                // Start the session and set the session variable
                session_start();

                // Example session assignment
                $_SESSION['id'] = $row['id'];
                $_SESSION['agency_name'] = $row['agency_name'];

                // Redirect to index.php in the parent directory
                header("Location: ../agency/agency.php");
                exit();
            }

            else {
                echo "Invalid email or password.";
            }
            // Close the statement
            mysqli_stmt_close($stmt);
        }
        else {
            echo "Failed to prepare the SQL statement.";
        }
    }
    
} 
else {
    echo "Invalid request.";
}
?>
