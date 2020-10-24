<?php

// Чтобы проверить факт существования файла:

if (file_exists(CONFIG."/contacts.txt")) {   
    echo "<h3>Файл существует</h3>"; 
}

// fopen() - открывает локальный или удаленный файл и возвращает указатель на него.

$fh = fopen(CONFIG."/contacts.txt", 'r') or die("не удалось открыть файл");
$fh = fopen(CONFIG."/contacts.txt", 'rb') or die("не удалось открыть файл");

if (!is_dir(CONFIG."/contacts.txt")) {
    $fh = fopen(CONFIG."/contacts.txt", 'rb') or die("не удалось открыть файл");    
}

// ошибка при работе с файлами
if (!is_dir(CONFIG."/contacts.txt")) {
    $fh = @fopen(CONFIG."/contacts.txt", 'rb') or die("не удалось открыть файл");    
}

if ($fh) {
    echo "<h3>File opened</h3>";
}

// Для построчного чтения используется функция fgets()
while (!feof($fh)) {
    echo "<h3>".fgets($fh)."</h3>";
} 

// поблочное считывание определенного количества байт из файла с помощью функции fread():
while (!feof($fh)) {
    echo "<h3>".fread($fh, 4096)."</h3>";
}


fclose($fh);
echo "<h3>File closed</h3>";


if (!is_dir(CONFIG."/contacts.txt")) {
    $file = @file(CONFIG."/contacts.txt");
}

$count=count($file);
echo "<h3>".$count."</h3>";

// Если нам надо прочитать файл полностью:
$contacts = file_get_contents(CONFIG."/contacts.txt");
// При этом нам не надо открывать явно файл, получать дескриптор, а затем закрывать файл.
echo "<h3>".$contacts."</h3>";

$url = CONFIG."/contacts.json"; // your json file path
$data = array(); // create empty array

// read json file from url
$readJSONFile = file_get_contents($url);
print_r($readJSONFile); // display contents

//convert json to array in php
$data = json_decode($readJSONFile, TRUE);
var_dump($data); // print array

  if(isset($_REQUEST["name"])){
    echo "<p>Hi, " . $_REQUEST["name"] . "</p>";
  }
//   if(isset($_POST["name"])){
//     echo "<p>Hi, " . $_POST["name"] . "</p>";
//   }
?>

<form method="POST" action="/test">
    <label for="inputName">Name:</label>
    <input type="text" name="name" id="inputName">
    <input type="submit" value="Submit">
</form>