<?php
include 'admin_connection.php';
require_once('start_session.php');


if(isset($_POST['Login'])){
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sel = "SELECT * FROM `staffs` WHERE name='$name'";
    $result = mysqli_query($conn, $sel);

    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $storedHashedPassword = $row['password'];

        if(password_verify($password, $storedHashedPassword)){
            echo "You are successfully logged in";

            $_SESSION['logged_in'] = true;
            header('Location: admin_addproduct.php');
            exit();
            // Perform further actions after successful login
        } else {
            echo "Enter correct password";
        }
    } else {
        echo "User does not exist";
    }
}
?>
<div class="a_login">
<h2>Login</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="name"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login" name="Login">
    </form>
</div>