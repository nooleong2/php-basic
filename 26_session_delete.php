<?php

    // 세션 삭제
    // 세션 전체 삭제
    session_start(); # 먼저 선언
    
    // session_unset();
    // session_destroy();

    // 세션 부분 삭제
    unset($_SESSION["ss_age"]); # 해당 세션만 삭제

    // 삭제를 안해주면 php.ini파일에 설정된 시간이 지나면 자동으로 삭제 됨
    // session.gc_maxlifetime 시간 수정
    // ini 파일 수정 한 후 에는 서버 재기동 필수

    
?>
세션이 삭제되었습니다.
<a href="26_session_show.php">세션 확인</a>