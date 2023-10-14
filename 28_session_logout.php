<?php
    // 5. 로그아웃 페이지로 넘어왔을 때 해당 세션 정료
    session_start();
    session_unset();
    session_destroy();

?>
<!-- 로그아웃 알림 -->
<script>
    alert("로그아웃 되었습니다.");
    self.location.href = "28_session_login_index.php";
</script>