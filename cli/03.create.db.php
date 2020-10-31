<?php
// Создание MySQL базы данных с помощью MySQLi
$servername = "localhost";
$username = "root";
$password = "ghbdtn";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die('Could not connect: ' .mysqli_error());
    // die('Could not connect: ' .mysqli_connect_error());
}
// Create database CREATE DATABASE IF NOT EXISTS store;
$sql = "DROP DATABASE IF EXISTS shop; CREATE DATABASE shop;";
if (mysqli_multi_query($conn, $sql)) {
    echo "\nDatabase shop created successfully.\n";
} else {
    echo "\nSorry, database creation failed ".mysqli_error($conn)."\n\n";  
}
mysqli_close($conn);