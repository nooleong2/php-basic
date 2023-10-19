<?php

$server = "localhost";
$username = "root";
$passwd = "";
$dbname = "php_db";

try {

    $conn = new PDO("mysql:host={$server};dbname={$dbname}", $username, $passwd);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "DB Connection Success";

} catch (PDOException $e) {
    echo $e -> getMessage();
    exit;
}