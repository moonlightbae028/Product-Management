<?php
// db_connect.php
$servername = "localhost";  // Change if necessary
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "product";        // Database name

date_default_timezone_set('Asia/Manila'); // Set to your correct timezone

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
