<?php

// Before we can access data in the MySQL database, we need to be able to connect to the server:
// PHP mysqli_connect() function is used to connect with MySQL database. 
// It returns resource if connection is established or null.

// Syntax : resource mysqli_connect (server, username, password)
// MySQL Connection Using (MySQLi Procedural)
// Create connection
$con = mysqli_connect("localhost", "root", "ghbdtn");
    
$servername = "localhost";
$username = "root";
$password = "ghbdtn";
    
// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection

if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
// Check connection
if (mysqli_connect_errno()) { /* проверка соединения */
    printf("Could not connect: ' . mysqli_error() %s\n", mysqli_connect_error());
    exit();
}
// Check connection
if (!$con) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Соединение с MySQL установлено!" . PHP_EOL;
echo "Информация о сервере: " . mysqli_get_host_info($con) . PHP_EOL;

// PHP mysqli_close()
// PHP mysqli_close() function is used to disconnect with MySQL database. It returns true if connection is closed or false.

// Syntax: bool mysqli_close(resource $resource_link)
mysqli_close($con);
