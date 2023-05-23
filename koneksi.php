<?php
$servername = "localhost";
$user = "root";
$pass = "";
$myDB="db_nando";
$conn = new mysqli($servername, $user, $pass,$myDB);
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
//echo "Connected to DataBase successfully";
?>
