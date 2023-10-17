<?php

    // form 태그를 이용한 데이터베이스 생성

    /*
        데이터베이스 생성 query
        CREATE DATABASE my_db;

        테이블 생성 query
        CREATE TABLE board (
            idx INT UNSIGNED NOT NULL AUTO_INCREMENT,
            subject VARCHAR(255) DEFAULT "" COMMENT "게시물 제목",
            content TEXT comment "게시물 내용",
            rdate DATETIME DEFAULT NOW(),
            PRIMARY KEY(idx)
        );
    */

    include "44_form_database_module.php";

    $subject = $_POST["subject"];
    $content = $_POST["content"];
    
    try {
        $sql = "INSERT INTO board(subject, content) VALUES ('$subject', '$content')";
        
        $conn -> exec($sql);
        echo "게시물 등록 완료";

        // 해당 게시물 key를 알아야 이동 가능
        $last_id = $conn -> lastInsertId(); # 마지막 등록된 게시물의 아이디 반환
        echo "<p>게시물 번호 : ".$last_id."번 입니다.</p>";

        // 스크립트를 이용해서 페이지 이동
        echo 
        "
        <script>
            self.location.href = '44_form_database_view.php?idx=".$last_id."';
        </script>
        ";
    } catch (PDOException $e) {
        echo $e -> getMessage();
    }
    
    $conn = null;
