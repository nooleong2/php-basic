<?php
    
    // php-mysql 연동 3가지 방법
    /*
        1. MySQLi(객체지향)
        2. MySQLi(절차지향)
        3. PDO : extention이 설치 되어있지 않으면 동작하지 않음
    */

    // MySQLi OOP(객체지향)
    $servername = "localhost"; # SERVER ADDRESS
    $username = "root"; # MySQL ID
    $password = "1"; # MySQL PASSWD

    // MySQL 객체지향 방식
    // $conn = new mysqli($servername, $username, $password);
    // if ($conn -> connect_error) {
    //     echo "DB 연결에 실패했습니다.<br>";
    //     exit;
    // }

    // MySQL 절차지향 방식
    // $conn = mysqli_connect($servername, $username, $password);
    // if (!$conn) {
    //     // echo "DB 연결에 실패했습니다.<br>";
    //     // exit;
    //     die("DB 연결에 실패했습니다.<br>"); # exit 없이 한 번에
    // }

    // echo "DB 연결에 성공했습니다.<br>";

    // PDO : phpinfo에 PDO 설치되었는지 확인해 볼 수 있음
    try {
        $conn = new PDO("mysql:host={$servername}", $username, $password);
        echo "DB 연결에 성공했습니다.<br>";
    } catch (PDOException $e) {
        echo "DB 연결에 실패했습니다.<br>";
        echo $e -> getMessage();
    }


    