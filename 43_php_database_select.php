<?php

    // 데이터베이스 Select

    // 1. DB 연결 (include 사용)
    include '43_php_database_include.php';

    // 2. query 작성, 실행
    try {

        $sql = "SELECT * FROM myguests";
        
        $stmt = $conn -> prepare($sql); # 2-1 $stmt에 쿼리문을 담는다.
        $stmt -> execute(); # 2-2 execute() 함수로 실행

        // PDO::FETCH_ASSOC : 필드명
        // PDO::FETCH_NUM : 숫자
        // PDO:FETCH_BOTH : 둘다 default
        $rs = $stmt -> fetchAll(PDO::FETCH_ASSOC); # 2-3 PDO의 fetchAll() 함수를 이용해서 데이터를 받는다.

        echo
        "<table border='1'>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
        ";

        foreach ($rs as $row) {
            echo
            "<tr>
                <td>".$row['firstname']."</td>
                <td>".$row['lastname']."</td>
                <td>".$row['email']."</td>
            </tr>";
        }

        echo "</table>";
        
    } catch (PDOException $e) {
        $e -> e.getMessage();
    }

    $conn = null;
