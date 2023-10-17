<?php

    // 데이터베이스에서 테이블 생성
    $servername = "Localhost";
    $username = "root";
    $passwd = "";
    $dbname = "php_db"; # 생성이 되어있을 시 사용 할 database;

    // 1. DB 연결
    try {
        $conn = new PDO("mysql:localhost=$servername;dbname=$dbname", $username, $passwd);
        echo "MySQL -> php_db 데이터 접근 완료";
    } catch (PDOException $e) {
        echo $e -> getMessage();
        exit;
    }

    try {
        // 2. query 작성
        // create table query
        $sql = "CREATE TABLE MyGuests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        // echo "TABLE이 생성되었습니다.";

        // insert query
        $query = "INSERT INTO myguests(firstname, lastname, email) VALUES ('John', 'Doe', 'john@fake.com')";

        echo "<p>쿼리 전송 성공</p>";

        // 3. query 실행
        $conn -> exec($query);
        
    } catch (PDOException $e) {
        echo $e -> getMessage();
    }

    // 마지막은 연결 끊어 주기
    $conn = null;