<?php

$servername = "localhost";
$username = "root";
$password = "ghbdtn";
$dbname = "shop";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);
/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
echo "Connected successfully\n\n";

// Create sql

$sql = "SELECT * FROM guestbook";
$result = mysqli_query($conn, $sql);
$collection = [];

// Fetch all
// $collection = mysqli_fetch_all($result);
// $collection = mysqli_fetch_all($result, MYSQLI_ASSOC);
$collection = mysqli_fetch_all($result, 1);

var_dump($collection);

// Free result set
mysqli_free_result($result);

foreach ($collection as $row) {
    echo "id: " . $row["id"]. " - User Name: " . $row["username"]. " Email: " . $row["email"]. " Comment: " . $row["message"]. " Created: " . $row["created_at"]. "\n\n";
}

mysqli_close($conn);
