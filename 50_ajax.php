<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajax input check</title>
</head>
<body>
    <form name="form" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
        <label for="">아이디</label>
        <input type="text" name="username" id="username" autocomplete="off">
        <input type="button" value="중복 확인" id="ajax_btn"><br>
        <label for="">이메일</label>
        <input type="email" name="email" id="email" autocomplete="off"><br>
        <button type="button" id="submit_btn">전송</button>
        <p id="msg">아이디는 대소문자 구분없이 12자 이내로 입력바랍니다.</p>
    </form>

    <script>
        const ajax_btn = document.querySelector("#ajax_btn"); // 중복 확인 버튼
        const btn = document.querySelector("#submit_btn"); // 전송 버튼

        // 아이디 중복 버튼 핸들링
        ajax_btn.addEventListener("click", () => {
            const username = document.querySelector("#username");
            const span_msg = document.querySelector("#msg"); // 출력하기 위해

            const xhr = new XMLHttpRequest(); // 통상적으로 XMLHttpRequest() 함수를 많이 사용
            xhr.open("GET", "./50_check_id.php?id=" + username.value, true); // 접근 방식, 접근 페이지
            xhr.send(); // 요청 전송

            // 통신 후 작업
            xhr.onload = () => {
                // 통신 성공
                if (xhr.status == 200) {
                    // parse() 메서드는 JSON 문자열의 구문을 분석하고, Javascript 값이나 객체 생성
                    const obj = JSON.parse(xhr.response);
                    if (obj.result == "exist") {
                        span_msg.textContent = "이미 사용중인 아이디입니다.";
                        username.value = "";
                        username.focus();
                    } else {
                        span_msg.textContent = "사용 하실 수 있는 아이디 입니다.";
                    }
                } else {
                    console.log(xhr.status);
                }
            }
        })

        // MySQL 데이터 등록 (XML 방식)
        btn.addEventListener("click", () => {

            const uname = document.querySelector("#username");
            const email = document.querySelector("#email");

            const params = "uname=" + uname.value + "&" + "email=" + email.value;
            const xhr = new XMLHttpRequest();

            xhr.open("POST", "./50_insert_id.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    uname.value = "";
                    email.value = "";
                    uname.focus();
                    alert(xhr.responseText);
                }
            }
            xhr.send(params);

        });
    </script>
</body>
</html>

