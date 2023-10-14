<?php
    
    // 4. 로그인이 성공 한 후 페이지
    session_start(); # 세션 시작

    // 4-1 setting이 안되어있거나 또는 아이디가 비어있을 경우
    if (!isset($_SESSION["ss_id"]) || $_SESSION["ss_id"] == "") {

        echo "
            <script>
                alert('여기는 회원 전용 페이지입니다. 로그인 후 접근이 가능합니다.');
                self.location.href = '28_session_login_index.php';
            </script>
        ";

        exit; # 다음 구문이 실행 되지 않도록 처리
    }

?>
<!-- 4-2 세션이 있다면 아래 페이지 노출 -->
<p>여기는 회원전용 페이지입니다.</p>

<a href="28_session_logout.php">로그아웃</a>