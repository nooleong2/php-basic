<?php

    // include 불러와서 쓸 파일
    $servername = "Localhost";
    $username = "root";
    $passwd = "";
    $dbname = "php_db";

    // 1. 데이터베이스 연결
    try {
        $conn = new PDO("mysql:localhost=$servername;dbname=$dbname", $username, $passwd);
        // echo "<p>".$dbname." 데이터베이스 연결 성공</p>"; # 연결 확인차 찍고 삭제
    } catch (PDOException $e) {
        $e -> e.getMessage();
        exit;
    }
