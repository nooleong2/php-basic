<?php

    $servername = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "todolist";

    try {

        $conn = new PDO("mysql:host={$servername};dbname={$dbname}" ,$username, $passwd);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo "DB Connection Success";

    } catch (PDOException $e) {
        $e -> getMessage();
        exit;
    }