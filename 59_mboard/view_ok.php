<?php
    require "./config/db_config.php"; # DB

    // mode, code, idx, password 값 대입
    $mode     = ( isset($_POST["mode"]    ) && $_POST["mode"]     != "" ) ? $_POST["mode"] : "";
    $code     = ( isset($_POST["code"]    ) && $_POST["code"]     != "" ) ? $_POST["code"] : "";
    $idx      = ( isset($_POST["idx"]     ) && $_POST["idx"]      != "" && is_numeric($_POST["idx"]     ) ) ? $_POST["idx"]      : "";
    $password = ( isset($_POST["password"]) && $_POST["password"] != "" && is_numeric($_POST["password"]) ) ? $_POST["password"] : "";

    // 값 들이 비었을 경우 체크
    if ($mode == "") {
        $arr = [
            "result" => "empty_mode",
        ];
        die(json_encode($arr));
    } else if ($idx == "") {
        $arr = [
            "result" => "empty_idx",
        ];
        die(json_encode($arr));
    } else if ($code == "") {
        $arr = [
            "result" => "empty_code",
        ];
        die(json_encode($arr));
    } else if ($password == "") {
        $arr = [
            "result" => "empty_password",
        ];
        die(json_encode($arr));
    }

    // idx(게시물 번호) 가지고 password, code 추출 Query
    $sql = "SELECT password, code FROM mboard WHERE idx = :idx;";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindParam(":idx", $idx);
    $stmt -> execute();
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);

    // code의 값이 DB에서 들고온 값이 다를 경우
    if ($row["code"] != $code) {
        $arr = ["reulst" => "wrong_code"];
        die(json_encode($arr));
    }

    // 패스워드 단방향 체크
    if (password_verify($password, $row["password"])) {
        // 모드에 따른 분기 처리
        if ($mode == "update") {
            /**
             * 수정 모드
             * 세션 추가 idx 값 기준
             * update.php 에서 비밀번호가 맞으면 해당 게시물 수정 가능
             */
            session_start();
            $_SESSION["update_idx"] = $idx;
            $arr = ["result" => "update_success"];

        } else if ($mode == "delete") {
            /**
             * 삭제 모드
             * 클라이언트에서 받은 idx 값으로 해당 게시물 삭제 Query
             */
            $sql = "DELETE FROM mboard WHERE idx = :idx;";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindParam(":idx", $idx);
            $stmt -> execute();

            $arr = ["result" => "delete_success"];
        } else {
            // 틀린 모드가 들어왔을 때
            $arr = ["result" => "wrong_mode"];
        }

        die(json_encode($arr));

    } else {
        // 비밀번호 오류
        $arr = ["result" => "wrong_password"];
        die(json_encode($arr));
    }
