<?php

$servername = "localhost";
$username = "root";
$password = "this is my password";
$db = "onlineShop";


$con = mysqli_connect($servername, $username, $password,$db);
mysqli_set_charset($con, "utf8mb4");



if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
