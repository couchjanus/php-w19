<?php

$servername = "localhost";
$username = "root";
$password = "ghbdtn";
$dbname = "shop";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
echo "Connected successfully\n\n";

$search = "Tom";
$stmt = mysqli_stmt_init($conn);

// Этот код сформирует подготовленное выражение для выполнения вашего запроса.
$sql = "SELECT * FROM guestbook WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
// За передачу значений в подготовленный запрос отвечает функция mysqli_stmt_bind_param(). 
// Она принимает тип и сами переменные:
mysqli_stmt_bind_param($stmt, 's', $search);
/* выполнение подготовленного запроса */
mysqli_stmt_execute($stmt);
// После выполнения запроса получить его результат в формате mysqli_result можно функцией mysqli_stmt_get_result():
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_array($result)){
    foreach ($row as $r) {
            print "$r ";
    }
    print "\n";
}
printf("Select %d строк.\n", mysqli_stmt_affected_rows($stmt));

/* закрываем запрос */
mysqli_stmt_close($stmt);

/* закрываем подключение */
mysqli_close($conn);