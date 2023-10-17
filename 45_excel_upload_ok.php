<?php

    // input type text, passwd email ... $_POST, $_GET 요청 방식에 따라 선택
    // 파일로 받은것은 꼭 $_FILES로 확인
    include "45_excel_database_module.php";

    try {
        // csv file 받아오는 법
        $file = fopen($_FILES["file"]["tmp_name"], "r");
        // print_r($_FILES);

        $arr = []; // 담을 곳
        // loop가 많이 돌면 성능 이슈 발생 하게 되면 사용
        // loop 시작 전 beginTransaction(); 
        // loop 끝날 때 commit();
        $conn -> beginTransaction();
        while (($line = fgetcsv($file)) !== false) {
            // array_push($arr, $line); # 확인차 데이터 담아 봄

            // insert query 작성
            $sql = "INSERT INTO member(uname, email) VALUES ('".$line[0]."', '".$line[1]."')";
            $conn -> exec($sql);
        }
        $conn -> commit();

        fclose($file);

    } catch (PDOException $e) {
        $conn -> rollBack();
        echo $e -> getMessage();
    }

    $conn = null;