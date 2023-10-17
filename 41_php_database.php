<?php

    // 1. PDO 데이터베잇 연결
    $servername = "Localhost";
    $username = "root";
    $passwd = "";

    try {
        $conn = new PDO("mysql:localhost{$servername}", $username, $passwd);
        echo "MySQL 연결 성공";
    } catch (PDOException $e) {
        echo $e -> getMessage();
        exit;
    }

    // 2. 쿼리문 작성 후 실행
    try {
        $dbname = "php_db";
        $sql = "CREATE DATABASE ".$dbname;
        
        $conn -> exec($sql);
        echo "<p>".$dbname."데이터베이스 생성 성공</p>";
    } catch (PDOException $e) {
        echo $e -> getMessage();
    }

    // 제거
    $conn = null;