<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "database_1";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>