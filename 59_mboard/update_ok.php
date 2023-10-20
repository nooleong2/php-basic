<?php

    include "./config/db_config.php";

    session_start();
    $update_idx = ( isset($_SESSION["update_idx"]) && $_SESSION["update_idx"] != "" && is_numeric($_SESSION["update_idx"]) ) ? $_SESSION["update_idx"] : "";
    
    // update.php 에서 넘어 온 값들
    $name = ( isset($_POST["name"]) && $_POST["name"] != "" ) ? $_POST["name"] : "";
    $password = ( isset($_POST["password"]) && $_POST["password"] != "" ) ? $_POST["password"] : "";
    $subject = ( isset($_POST["subject"]) && $_POST["subject"] != "" ) ? $_POST["subject"] : "";
    $content = ( isset($_POST["content"]) && $_POST["content"] != "" ) ? $_POST["content"] : "";
    $code = ( isset($_POST["code"]) && $_POST["code"] != "" ) ? $_POST["code"] : "";
    $idx = ( isset($_POST["idx"]) && $_POST["idx"] != "" && is_numeric($_POST["idx"] ) ) ? $_POST["idx"] : "";

    // idx 체크
    if ($idx == "") {
        $arr = ["result" => "empty_idx"];
        die(json_encode($arr));
    }

    // session_idx 랑 idx 맞는지 확인
    /**
     * session_idx 랑 idx 비교
     * 해당 게시물이 맞는지 체크 하는 부분
     */
    if ($update_idx != $idx) {
        $arr = ["result" => "denied"];
        die(json_encode($arr));
    }

    // 단방향 암호화 설정
    $passwd_hash = "";
    if ($password != "") {
        $passwd_hash = password_hash($password, PASSWORD_BCRYPT);
    }

    // 정규식을 이용해서 IMG 태그 전체 SRC 값을 추출하기
    // 정규표현식 REXEX
    $img_array = []; # DB에 이미지 리스트로 저장되는 컬럼이 있기때문에 배열 생성
    preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $matches);

    // 0번쨰는 이미지 전체 1번째는 src 값만 
    foreach ($matches[1] as $key => $val) {
       // 이미 업로드된 이미지
       if (substr($val, 0, 8) == "upload") {
        $img_array[] = $val;
        continue;
       }

       // 외부 링크 이미지는 skip
       if (substr($val, 0, 5) != "data:") {
        continue;
       }

       /**
        * 이미지 형식
        * $val = 'data:image/png;base64,~~~~~~.png'
        * $type: data:image/png
        * data: base64,~~~~~~.png
        * 
        * $data: ~~~~~~.png
        */
       list($type, $data) = explode(";", $val);
       list(, $data) = explode(",", $data);
       $data = base64_decode($data);

       // 확장자 구하기
       list(, $ext) = explode("/", $type); # $ext: png
       $ext = ($ext == "jpeg") ? "jpg" : $ext;

       // 파일명 만들기
       $filename = date("YmdHis")."_".$key.".".$ext;
       file_put_contents("./upload/".$filename, $data);

       /**
        * str_replace에 $content에 있는 값 중에
        * $val 부분을 찾아서
        * "./upload/".$filename 부분으로 바꾸고
        * $content에 다시 담는다.
        */
       $content = str_replace($val, "./upload/".$filename, $content);
       $img_array[] = "./upload/".$filename;
    }

    $imglist = implode("|", $img_array); # [a, b, c] ===> a|b|c 형태로 구분자 기준 문자열로 연결
    
    // 수정 시 패스워드 있을때 없을 때
    if ($passwd_hash != "") {
        // 패스워드까지 바꿀 경우 (입력 할 경우)
        $sql = "UPDATE mboard SET name=:name, subject=:subject, content=:content, imglist=:imglist, password=:password
        WHERE idx=:idx;";
    } else {
        // 패스워드는 바꾸지 않을 경우 (입력하지 않을 경우)
        $sql = "UPDATE mboard SET name=:name, subject=:subject, content=:content, imglist=:imglist
        WHERE idx=:idx;";
    }

    $stmt = $conn -> prepare($sql);
    $stmt -> bindParam(":name", $name);
    if ($passwd_hash != "") {
        $stmt -> bindParam(":password", $passwd_hash);
    }
    $stmt -> bindParam(":subject", $subject);
    $stmt -> bindParam(":content", $content);
    $stmt -> bindParam(":imglist", $imglist);
    $stmt -> bindParam(":idx", $idx);
    $stmt -> execute();
    
    $arr = ["result" => "success"];
    die(json_encode($arr));


    