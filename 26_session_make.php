<?php

    // 세션 생성
    session_start(); # 먼저 선언
    
    $_SESSION["ss_name"] = "누렁이";
    $_SESSION["ss_age"] = "2살";
    
?>
세션이 생성되었습니다.
<a href="26_session_show.php">세션 확인</a>