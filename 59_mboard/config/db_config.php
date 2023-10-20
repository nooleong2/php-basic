<?php

    /**
     * DATABASE
     * sname : 서버 이름
     * uname : 데이터베이스 아이디
     * password : 데이터베이스 비밀번호
     * dbname : 사용 할 데이터베이스 명
     */
    $sname = "localhost";
    $uname = "root";
    $password = "";
    $dbname = "my_db";

    try {
        
        // PDO를 이용한 서버 연결
        $conn = new PDO("mysql:host=${sname};dbname={$dbname}", $uname, $password);
        // ERROR 메시지 출력을 원할하게 해줄 세팅
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo "<p>DB Connection Success!</p>"; # 확인 하고 나면 항상 주석으로 처리

    } catch (PDOException $e) {
        $e -> getMessage();
        exit;
    }