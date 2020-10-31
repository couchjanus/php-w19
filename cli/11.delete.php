<?php

$servername = "localhost";
$username = "root";
$password = "ghbdtn";
$dbname = "shop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
echo "Connected successfully\n\n";

// Create sql
// UPDATE <имя таблицы> SET <имя столбца1> = <значение2>, <имя столбца2> = <значение2>... WHERE <имя столбца> = <значение>

$sql = "DELETE FROM guestbook WHERE id = 2";

mysqli_query($conn, $sql);

$collection = [];

$sql = "SELECT * FROM guestbook";
$result = mysqli_query($conn, $sql);
$collection = mysqli_fetch_all($result, 1);
// Free result set
mysqli_free_result($result);

foreach ($collection as $row) {
    echo "id: " . $row["id"]. " - User Name: " . $row["username"]. " Email: " . $row["email"]. " Comment: " . $row["message"]. " Created: " . $row["created_at"]. "\n\n";
}

mysqli_close($conn);

