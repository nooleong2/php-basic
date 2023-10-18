<?php
    $servername = "localhost";
    $username = "root";
    $passwd = "";
    $db_name = "php_db";
    

    try {
       $conn = new PDO("mysql:host={$servername};dbname={$db_name}", $username, $passwd);
       $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
       echo $e -> getMessage();
       exit;
    }
?>