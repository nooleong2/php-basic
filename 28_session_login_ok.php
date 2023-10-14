<?php

    // Session을 이용한 로그인 처리

    // 1. 아이디, 비밀번호가 정확히 들어왔는지 확인
    $id = (isset($_POST["id"]) && $_POST["id"] != "") ? $_POST["id"] : "";
    $passwd = (isset($_POST["passwd"]) && $_POST["passwd"] != "") ? $_POST["passwd"] : "";

    // 2. 아이디, 비밀번호가 정확히 안들어 왔을 경우 처리
    if ($id == "") {
        echo "
            <script>
                alert('아이디를 입력하시기 바랍니다.');
                history.go(-1); // focus가 없기때문에 뒤로가기 사용
            </script>
        ";
        exit; # 다음 구문 실행 안되게 나감
    }

    if ($passwd == "") {
        echo "
            <script>
                alert('비밀번호를 입력하시기 바랍니다.');
                history.go(-1);
            </script>
        ";
        exit; # 다음 구문 실행 안되게 나감
    }

    // 3. 아이디, 비밀번호가 정확히 들어 왔으면
    if ($id == "guest" && $passwd == "1234") {

        // 3-1 아이디, 비밀번호가 맞았을 경우
        session_start(); # Session Start

        $_SESSION["ss_id"] = $id; # id 값을 session id에 저장
        echo "
            <script>
                alert('로그인 성공했습니다.');
                self.location.href = '28_session_login_member.php';
            </script>
        ";
    } else {

        // 3-2 아이디, 비밀번호가 틀렸을 경우
        echo "
            <script>
                alert('로그인 실패했습니다. 아이디와 비밀번호를 확인해주세요.');
                self.location.href = '28_session_login_index.php';
            </script>
        ";
    }


?>