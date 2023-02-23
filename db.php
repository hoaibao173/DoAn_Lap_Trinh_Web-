<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "dbunizone";
$host ="localhost:3306";
// Create connection
$con = mysqli_connect($servername, $username, $password,$db);
$objPDO = new PDO("mysql:host=$host; dbname=$db", $username, $password);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
