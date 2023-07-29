<?php
include 'admin_nav.php';
include 'admin_connection.php';


// Start the session
require_once('start_session.php');

// Retrieve session data
// if (isset($_SESSION['uname'])) {
//     $username = $_SESSION['uname'];
//     echo "Welcome, $username!";
// } else {
//     echo "You are not logged in.";
//     header('Location: admin_login.php');
// }

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect the user to the login page if not logged in
    header('Location: admin_login.php');
    exit(); // Important: Always exit after a redirect
  }




if (isset($_POST['signup'])) {
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Check if the username already exists
    $udouble = "SELECT `name` FROM `staffs` WHERE name='$uname'";
    $result = mysqli_query($conn, $udouble);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "Username '$uname' already exists";
        } else {
            if ($password == $cpassword) {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                // Insert the new user into the database
                $stmt = "INSERT INTO `staffs`(`name`, `password`) VALUES ('$uname', '$hashedPassword')";
                mysqli_query($conn, $stmt);
                    echo "Signup successful";
                    // You can redirect the user to another page here
            } else {
                echo "Passwords do not match";
            }
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <style>
        input {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <form action="admin_signup.php" method="POST" style="font-size: 20px; ">
        <label for="">Username:</label><br>
        <input type="text" name="uname" placeholder="Enter username" required pattern="[a-zA-Z0-9_]+"><br>
        <label for="">Password:</label><br>
        <input type="password" name="password" placeholder="Enter password" required><br>
        <label for="">Confirm Password:</label><br>
        <input type="password" name="cpassword" placeholder="Confirm password" required><br>
        <input type="submit" name="signup" value="Signup">
    </form>
</body>
</html>
