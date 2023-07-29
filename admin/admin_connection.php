<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'project_clothing_db'; 

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
else{
    // echo "success";
}
?>
