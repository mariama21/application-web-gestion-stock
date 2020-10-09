<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "gestion_stock";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);
$conn->set_charset("utf8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
