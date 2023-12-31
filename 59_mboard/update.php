<?php
    include "./config/db_config.php";
    include "./config/config.php";

    session_start();
    $update_idx = ( isset($_SESSION["update_idx"]) && $_SESSION["update_idx"] != "" && is_numeric($_SESSION["update_idx"]) ) ? $_SESSION["update_idx"] : "";
    $idx = ( isset($_GET["idx"]) && $_GET["idx"] != "" && is_numeric($_GET["idx"]) ) ? $_GET["idx"] : "";

    if ($idx == "") {
        die("<script>alert('게시물 번호가 없습니다.');history.go(-1);</script>");
    }

    if ($update_idx != $idx) {
        die("<script>alert('수정 권한이 없는 게시물 입니다.');history.go(-1);</script>");
    }

    $sql = "SELECT * FROM mboard WHERE idx = :idx;";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindParam(":idx", $idx);
    $stmt -> execute();
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
?>
<?php

// 공통 사용    
include "./config/config.php"; # CODE

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $board_title ?>글 수정</title>

<!-- BOOTSTRAP 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SUMMERNOTE -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body>

<div class="container">
    <!-- 타이틀 -->
    <div class="mt-4 mb-3">
        <h2><?= $board_title ?></h2>
    </div>

    <!-- 이름/비밀번호 -->
    <div class="mb-2 d-flex gap-2">
        <input type="text" name="name" id="name" class="form-control w-25" placeholder="글쓴이" autocomplete="off" value="<?= $row["name"] ?>">
        <input type="password" name="passwod" id="password" class="form-control w-25" placeholder="비밀번호" autocomplete="off">
    </div>

    <!-- 게시판 제목 -->
    <div>
        <input type="text" name="subject" id="subject" class="form-control mb-2" value="<?= $row["subject"] ?>">
    </div>

    <!-- 게시판 내용 -->
    <div id="summernote" class="content"></div>

    <!-- 등록/목록 버튼 -->
    <div class="mt-2 d-flex gap-2 justify-content-end">
        <button class="btn btn-primary" id="btn_submit">등록</button>
        <button class="btn btn-secondary" id="btn_list">목록</button>
    </div>
</div>

<!-- JAVASCRIPT -->
<script>

    // 핸들링 할 버튼
    const btn_list = document.querySelector("#btn_list");
    const btn_submit = document.querySelector("#btn_submit");

    // URL code 값 가져오기
    /**
     * replace : A 값을 B 값으로 바꾼다.
     * split : 해당 기준으로 짜른 후 배열로 반환한다
     * f1.append의 code 값 생성을 위한 작업
     */
    const codeValue = window.location.search.replace("?", "").split(/[=?&]/); // URL Query ? 이후의 값을 가져올 수 있다
    let param = {}; // 객체 생성
    for (let i = 0; i < codeValue.length; i++) {
        param[codeValue[i]] = codeValue[++i]; // 짝수는 key값, 짝수는 value값 :: 배열로 받은것을 객체 타입으로 작업
    }
    
    // 목록 버튼 클릭시 이벤트 발생
    btn_list.addEventListener("click", () => {
        self.location.href = "./list.php?code=" + param["code"];
    });

    // 전송 버튼 클릭시 이벤트 발생
    btn_submit.addEventListener("click", () => {
        
        // 핸들링 할 태그들 
        const name = document.querySelector("#name");
        const password = document.querySelector("#password");
        const subject = document.querySelector("#subject");
        const markupStr = $('#summernote').summernote('code');

        // 값이 존재하는지 안하는지 체크
        if (name.value == "") {
            alert("글쓴이를 입력해주세요");
            name.focus();

            return;
        } else if (subject.value == "") {
            alert("제목을 입력해주세요");
            subject.focus();

            return;
        } else if (markupStr == "<p><br></p>") {
            alert("내용을 입력해주세요");
            
            return;
        }

        // form 태그 만들어서 append 시킨 다음에 전송
        const f1 = new FormData();
        f1.append("name", name.value);
        f1.append("password", password.value);
        f1.append("subject", subject.value);
        f1.append("content", markupStr); // form 객체가 아니여서 바로 접근 가능
        f1.append("code", param["code"]); // 객체로 만든 key value를 이용
        f1.append("idx", param["idx"]); // idx 값 게시물 번호

        // AJAX를 이용한 통신
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./update_ok.php", true);
        xhr.send(f1);
        btn_submit.disabled = true // 데이터 전송 중 다중 클릭 방지

        // AJAX 통신 후 핸들링
        xhr.onload = () => {
            if (xhr.status == 200) {
                // 전송 성공
                const response = JSON.parse(xhr.response);
                if (response.result == "success") {
                    alert("글 수정 되었습니다.");
                    self.location.href = "./view.php?code=" + param["code"] + "&idx=" + param["idx"]; // 코드(어떤 게시판 리스트로 갈건지)도 같이 가져 간다
                } else if (response.result == "denied") {
                    alert("수정 권한이 없습니다.");
                    self.location.href = "./list.php?code=" + param["code"]; // 코드(어떤 게시판 리스트로 갈건지)도 같이 가져 간다
                } else {
                    alert("글 수정 실패했습니다.");
                }
            } else {
                // 전송 실패
                alert(xhr.status);
            }
        }

    });

    

    // SUMMER NOTE LITE
    $('#summernote').summernote({
        placeholder: '글 내용을 입력해주세요.',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    // SUMMER NOTE CONTENT SET
    const content = `<?= $row["content"] ?>`; // 더블쿼터를 사용하면 img src의 더블쿼터가 또 있기때문에 사용 X
    $('#summernote').summernote('code', content);
</script>
</body>
</html>