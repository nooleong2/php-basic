<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="text"], [type="password"], input[type="email"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
    </style>
  </head>
  <body class="text-center">
    
    <main class="form-signin w-100 m-auto">
        <form name="login_form" id="login_form" action="54_login.php" method="POST">
            <img class="mb-4" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="username" id="username" autocomplete="off">
                <label for="floatingInput">아이디</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="passwd" id="passwd">
                <label for="floatingPassword">비밀번호</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="button" id="login_btn">로그인</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>

    <script>
        const login_btn = document.querySelector("#login_btn");
        login_btn.addEventListener("click", () => {
            const username = document.querySelector("#username");
            const passwd = document.querySelector("#passwd");

            if (username.value == "") {
                alert("아이디를 입력해주세요.");
                username.focus();

                return false;
            } else if (passwd.value == "") {
                alert("비밀번호를 입력해주세요.");
                passwd.focus();

                return false;
            }

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "./54_login.php", true);
            
            const login_form = document.querySelector("#login_form");
            const f = new FormData(login_form);

            xhr.send(f);

            xhr.onload = () => {
                if (xhr.status == 200) {
                    const data = JSON.parse(xhr.response);

                    if (data.result == "success") {
                        alert("로그인 성공");
                        self.location.href = "./54_login_ok.php";
                    } else {
                        alert("로그인 실패");
                    }
                } else {
                    alert("통신에 실패했습니다.");
                }
            }
        });

    </script>

    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>