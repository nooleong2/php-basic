<?php

    // DB Connection module 작업
    $servername = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "my_db";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passwd);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo $e -> getMessage();
        exit;
    }