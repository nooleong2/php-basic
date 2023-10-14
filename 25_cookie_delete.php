<?php
    // 쿠키 삭제 방법
    setcookie("ck_name", "", time() - 240, "/") # 과거 시간으로 지정하면 삭제 됨
?>
<a href="25_cookie_show.php">쿠키확인</a><br>