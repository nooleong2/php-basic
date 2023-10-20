<?php

    // DB 가져오기
    include "./config/db_config.php";
    
    // POST 요청이 왔는지 and 해당 키 값이 비어있지 않은지 논리 연산으로 값 대입
    $name = (isset($_POST["name"        ]) && $_POST["name"    ] != "") ? $_POST["name"    ] : "";
    $password = (isset($_POST["password"]) && $_POST["password"] != "") ? $_POST["password"] : "";
    $subject = (isset($_POST["subject"  ]) && $_POST["subject" ] != "") ? $_POST["subject" ] : "";
    $content = (isset($_POST["content"  ]) && $_POST["content" ] != "") ? $_POST["content" ] : "";
    $code = (isset($_POST["code"        ]) && $_POST["code"    ] != "") ? $_POST["code"    ] : "";
    $ip = $_SERVER["REMOTE_ADDR"]; # 현재 접속 중인 IP

    // $code undefined로 들어왔을 때(쿼리가 없을 때) 처리
    if ($code == "undefined") {
        $code = "freeboard";
    }

    // 비밀번호 단방향 암호화
    $passwd_hash = password_hash($password, PASSWORD_BCRYPT);

    // 정규표현식 REXEX
    $img_array = []; # DB에 이미지 리스트로 저장되는 컬럼이 있기때문에 배열 생성
    preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $matches);
    
    foreach($matches[1] as $key => $val) {
        // 불필요한 특수문자 기준으로 짤라서 사용
        list($type, $data) = explode(";", $val); # 짤린 부분의 앞은 $type 에 담고, 뒷 부분은 $data 에 담는다.
        // 확장자 잘라서 가져오기
        list(, $ext) = explode("/", $type); # / 기준으로 $type에 들어있는 문자열을 짜른다. 앞 부분은 필요없기 때문에 변수에 담지 않는다.
        // jpeg 의 경우 jpg 로 변경
        $ext = ($ext == "jpeg") ? "jpg" : $ext;
        // 파일명 만들기
        $filename = date("YmdHis")."_".$key.".".$ext; # 년월일 + 배열 index 값 + 확장자 추가

        /**
         * 이미지 업로드 될 폴더 생성 (MAC 경우 업로드 파일 chmod -R 777 [폴더명] 권한을 설정 해줘야지 파일이 업로드 된다)
         * $data 부분에서 이미지 소스 외에 필요없는 문자 마져 삭제
         * 인코딩 되어있는걸 디코딩해서 기존 문자열로 되돌리는 작업
         * 해당 폴더에 이미지 추가 하는 작업
         * 배열에 디코딩된 파일경로 + 파일명 추가
         * 마지막으로 기존 인코딩되있던 값을 디코딩해서 이미지 넣었은 폴더 밑 파일로 컨텐츠 내용 변경
         */
        list(, $base64_decode_data) = explode(",", $data);
        $rs_code = base64_decode($base64_decode_data);
        file_put_contents("./upload/".$filename, $rs_code); # 저장될 위치 + 파일명, 디코딩된 값
        $img_array[] = "./upload/".$filename;
        $content = str_replace($val, "./upload/".$filename, $content); # 바꿀 대상, 변경할 대상, 본문
    }

    /**
     * 배열 형태로 이미지를 저장 불가
     * 문자열로 바꾸기 작업
     * 배열 -> 문자열 합쳐주는 함수 implode(기준 문자열 생성, 배열)
     */
    $imglist = implode("|", $img_array); # ex) abcd|efg|zxc 식으로 문자열 합침
    
    /**
     * Query 작성
     * prepare() 함수를 이용해서 한번만 호출
     * bindParam() 함수로 값 삽입
     * execute() 함수로 실행
     * JSON 형태로 인코딩해서 클라이언트에 전달
     */
    $sql = "INSERT INTO mboard (code, name, password, subject, content, imglist, ip) 
    VALUES (:code, :name, :password, :subject, :content, :imglist, :ip);";

    $stmt = $conn -> prepare($sql);
    $stmt -> bindParam(":code", $code);
    $stmt -> bindParam(":name", $name);
    $stmt -> bindParam(":password", $passwd_hash);
    $stmt -> bindParam(":subject", $subject);
    $stmt -> bindParam(":content", $content);
    $stmt -> bindParam(":imglist", $imglist);
    $stmt -> bindParam(":ip", $ip);
    $stmt -> execute();

    $arr = [
        "result" => "success",
    ];

    die(json_encode($arr));



    