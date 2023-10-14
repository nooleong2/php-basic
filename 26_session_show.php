<?php

    /*
        Session
        세션은 여러 페이지에서 사용할 정보(변수에) 저장하는 방법
        쿠키와 달리 정보는 사용자 컴퓨터에 저장되지 않고 서버 컴퓨터에 저장

        ✔︎ session_start() 함수가 존재하는 페이지일 경우 세션이 계속 살아있음
        ✔︎ 단 ini 파일의 시간이 지날 떄 동안 다른 페이지로 이동하지 않거나 session_start() 함수가 없는 페이지에 간다면 session은 삭제 됨

        세션비교를 위해 사실 쿠키에 세션을 저장함
        $_COOKIE[PHPSESSIONID] 호출 하면 값이 나옴
    */
    
    // 세션 확인
    session_start();

    if (isset($_SESSION["ss_name"])) {
        echo "이름 : ".$_SESSION["ss_name"]."입니다<br>";
    } else {
        echo "이름을 모르겠습니다.<br>";
    }

    if (isset($_SESSION["ss_age"])) {
        echo "나이 : ".$_SESSION["ss_age"]."살 입니다<br>";
    } else {
        echo "나이을 모르겠습니다.<br>";
    }
?>

<a href="26_session_make.php">세션 생성</a>
<a href="26_session_delete.php">세션 삭제</a>