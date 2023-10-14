<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 폼</title>
</head>
<body>
    <!-- Session을 이용한 로그인 / 로그아웃 구현 -->
    <h1>로그인</h1>
    <form action="28_session_login_ok.php" method="post" name="login_form" autocomplete="off">
        <label for="">아이디</label>
        <input type="text" name="id" id="id" placeholder="아이디 입력"><br>
        <label for="">비밀번호</label>
        <input type="password" name="passwd" id="passwd" placeholder="비밀번호 입력"><br>
        <button id="login_btn">로그인</button>
    </form>

    <a href="28_session_login_member.php">회원전용 페이지</a>

    <script>
        const id = document.querySelector("#id");
        const passwd = document.querySelector("#passwd");
        const btn = document.querySelector("#login_btn");

        btn.addEventListener("click", (e) => {
            e.preventDefault(); // 이벤트 발생하는 것을 방지

            if (id.value == "") {
                alert("아이디를 입력해주세요.");
                id.focus();
                return false;
            }

            if (passwd.value == "") {
                alert("비밀번호를 입력해주세요.");
                passwd.focus();
                return false;
            }

            document.login_form.submit(); // 다시 이벤트 발생
        });

    </script>
</body>
</html>