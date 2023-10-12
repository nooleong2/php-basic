<?php

    // SUPERGLOBALS
    // 함수 안에 정의 된 값을 사용 할 수 있음
    
    function globals() {
        $GLOBALS["greeting"] = "Hello World"; # $슈퍼 전역변수 생성
    }

    // 함수 호출 후 사용 가능
    globals();
    echo $GLOBALS["greeting"]."<br>"; 

    /* $_SERVER 에 대해서 */
    // print_r($_SERVER); # HTTP 관련한 것들 제공

    if (strpos($_SERVER["HTTP_USER_AGENT"], "Chrome")) {
        echo "크롬 사용자 이십니다.<br>";
    } else {
        echo "크롬 사용자가 아닙니다.<br>";
    }

    // 아이피 확인
    echo "당신의 IP : ".$_SERVER["REMOTE_ADDR"]." 입니다.<br>";

    // 현재 페이지 주소
    echo $_SERVER["PHP_SELF"]."<br>";

    /* GET */
    // GET
    // 쿼리 스트링 : 주소 뒤에 ..php?name=[사람 이름]&company=[회사 이름] GET 요청
    echo "이름 : ".$_GET["name"]."<br>";
    echo "회사 : ".$_GET["company"]."<br><br>";

    /* POST */
    echo "POST 방식<br>";
    echo $_POST["name"]."<br>";
    echo $_POST["company"]."<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" autocomplete="off">
        이름 : <input type="text" name="name"><br>
        회사 : <input type="text" name="company"><br>
        <button type="submit">전송</button>
    </form>
</body>
</html>

