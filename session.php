<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utacy";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

