<?php
    
    require_once "54_db_module.php";

    // print_r($_POST);

    $username = $_POST["username"];
    $passwd = $_POST["passwd"];

    $sql = "SELECT * FROM user WHERE username = :username AND passwd = :passwd";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindParam(":username", $username);
    $stmt -> bindParam(":passwd", $passwd);
    $stmt -> execute();
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        // 회원인 경우
        session_start(); # 세션 만들어줌
        $_SESSION["id"] = $username;
        $arr = array(
            "result" => "success",
        );

        die(json_encode($arr)); # json으로 변경 후 전달 die == echo랑 exit 합친거

    } else {
        // 회원이 아닐 경우
        $arr = array(
            "result" => "fail",
        );

        die(json_encode($arr)); # json으로 변경 후 전달 die == echo랑 exit 합친거
    } 

    $conn = null;