<?php
    // AJAX - POST 이미지 업로드

    // print_r($_FILES);

    // 1. 배열인지 체크
    if (is_array($_FILES["photo"]["tmp_name"])) {
        // 2. n개 파일 
        $cnt = count($_FILES["photo"]["tmp_name"]); # 몇개가 업로드 됬는지 확인
        $rs_arr = array();

        for ($i = 0; $i < $cnt; $i++) {
            copy($_FILES["photo"]["tmp_name"][$i], "upload/".$_FILES["photo"]["name"][$i]); # 물리적인 값, 업로드 할 디렉토리 + 파일명
            $rs_arr[] = "upload/".$_FILES["photo"]["name"][$i];
        }

        $arr = array(
            "result" => "success",
            "img" => implode("|", $rs_arr), # upload/1.png|upload/2.png 이련 형식으로 보냄 (받는 쪽에서 '|' <- 기준으로 짤라서 사용)
        );

        die(json_encode($arr));

    } else {
        // 3. 1개 파일
        copy($_FILES["photo"]["tmp_name"], "upload/".$_FILES["photo"]["name"]); # 물리적인 값, 업로드 할 디렉토리 + 파일명

        $arr = array(
            "result" => "success",
            "img" => "upload/".$_FILES["photo"]["name"],
        );

        die(json_encode($arr));
    }
    