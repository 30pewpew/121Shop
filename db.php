<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smartshop";

// Create Connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check Connection
if (!$connection) 
{
    die("Database Connection failed: " . mysqli_connect_error());
}

//$connection=mysqli_connect("localhost","id2538044_sajalagrawal","******","id2538044_store") or die(mysqli_error($con));
//$connection=mysqli_connect("localhost","root","","store") or die(mysqli_error($con));
?>
