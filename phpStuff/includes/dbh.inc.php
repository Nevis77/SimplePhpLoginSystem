<?php

// keywords to access the php database
$serverName = "localhost";
$dbUsername = "root";
$dBPassword = "";
$dBName = "braxtondb";

$conn = mysqli_connect($serverName, $dbUsername, $dBPassword, $dBName);

if (!$conn){
    die("Connection Failed: " .mysqli_connect_error());
}