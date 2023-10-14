<?php

    /*
            쿠키란?
            종종 사용자를 식별하는데 사용합니다.
            서버가 이용자의 컴퓨터에 저장하는 작은 파일입니다.
            같은 컴퓨터가 브라우저로 페이지를 요청할 때 마다 쿠키도 함께 보냅니다.
            PHP를 사용하면 쿠키 값을 만들고 검색할 수 있습니다.
        */

    // 쿠키 확인

    if (isset($_COOKIE["ck_name"])) {
        echo "이름 : ".$_COOKIE["ck_name"]."입니다.<br>";
    } else {
        echo "쿠키가 존재하지 않습니다.<br>";
    }

?>
<a href="25_cookie_make.php">쿠키 생성</a>
<a href="25_cookie_delete.php">쿠키 삭제</a><br>