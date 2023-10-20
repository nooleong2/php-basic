<?php
    // 공통 사용
    include "./config/db_config.php"; # DB
    include "./config/config.php"; # CODE

    // numeric 숫자형인지 판단
    $idx = ( isset($_GET["idx"]) && $_GET["idx"] != "" && is_numeric($_GET["idx"]) ) ? $_GET["idx"] : "";

    if ($idx == "") {
        exit("비정상적인 접근을 허용하지 않습니다."); # 프로그램 종료
    }

    // 페이지 들어 올 때마다 조회수 1 증가하는 Query
    $sql ="UPDATE mboard SET hit = hit + 1 WHERE idx = :idx;";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindParam(":idx", $idx);
    $stmt -> execute();

    // 해당 idx 값 데이터 불러오는 Query
    $sql = "SELECT * FROM mboard WHERE idx = :idx;";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindParam(":idx", $idx);
    $stmt -> execute();
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $board_title ?> 자세히 보기</title>

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        #bbs_content img {
            max-width: 100%;
        }
    </style>
</head>
<body>

    <!-- 제목 -->
    <div class="container mt-3 w-50">
        <h1><?= $board_title ?></h1>
    </div>

    <!-- 컨텐츠 -->
    <div class="container border border-1 w-50">
        <!-- 글 제목 -->
        <div class="p-3">
            <span class="h3 fw-bolder">제목 : <?= $row["subject"]?><br></span>
        </div>

        <!-- 글 정보 -->
        <div class="d-flex border border-top-0 border-start-0 border-end-0 border-bottom-1 px-3">
            <span>이름 : <?= $row["name"]?></span>
            <span class="ms-5 me-auto">조회수 : <?= $row["hit"]?></span>
            <span>등록일 : <?= substr($row["rdate"], 0, 10)?></span>
        </div>

        <!-- 글 내용 -->
        <div class="p-3" id="bbs_content">
            내용 : <?= $row["content"]?><br>
        </div>

        <!-- 버튼 -->
        <div class="d-flex gap-2 p-3">
            <button class="btn btn-secondary me-auto" id="btn_list">목록</button>
            <button class="btn btn-warning" id="btn_update" data-bs-toggle="modal" data-bs-target="#modal">수정</button>
            <button class="btn btn-danger" id="btn_delete" data-bs-toggle="modal" data-bs-target="#modal">삭제</button>
        </div>
    </div>

    <!-- 수정,삭제 공용 모달창 -->
    <div class="modal" id="modal" tabindex="-1">
        <div class="modal-dialog">
            <form action="./view_ok.php" method="POST" name="modal_form">
                <input type="hidden" name="mode">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="password" name="password" class="form-control" id="password" placeholder="비밀번호를 입력해주세요">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
                        <button type="button" class="btn btn-primary" id="btn_password_chk">확인</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>

        // 버튼 사용을 위한 작업
        const btn_list = document.querySelector("#btn_list");
        const btn_update = document.querySelector("#btn_update");
        const btn_delete = document.querySelector("#btn_delete");
        const btn_password_chk = document.querySelector("#btn_password_chk");

        // code, idx, Key:Value 형태로 데이터 가공
        const splited = window.location.search.replace("?", "").split(/[=?&]/);
        let param = {};            
        for (let i = 0; i < splited.length; i++) {
            param[splited[i]] = splited[++i];
        }

        // 수정,삭제 버튼 클릭시 모달 제목 수정하기 위한 작업
        const modal_title = document.querySelector("#modal_title");

        // 목록 버튼 핸들링 
        btn_list.addEventListener("click", () => {
            //클릭시 code값 을 가지고 list.php 이동 
            self.location.href = "./list.php?code=" + param["code"];
        });

        // 업데이트 버튼 핸들링
        btn_update.addEventListener("click", () => {
            modal_title.textContent = "수정하기";
            document.modal_form.mode.value = "update";
        });

        // 삭제 버튼 핸들링
        btn_delete.addEventListener("click", () => {
            modal_title.textContent = "삭제하기";
            document.modal_form.mode.value = "delete";
        });

        // 비밀번호 확인 버튼 핸들링
        btn_password_chk.addEventListener("click", () => {
            
            const password = document.querySelector("#password");
            // 1. 비밀번호 값이 있는지 없는지 확인
            if (password.value == "") {
                alert("비밀번호를 입력해주세요.");
                password.focus();
                return;
            }

            /**
             * 2. 비밀번호가 있다면 AJAX 통신
             * 비밀번호가 있다면 통신을 위해 XMLHttpRequest() 함수 생성
             * 통신할 데이터 new FromData() 생성
             * idx, code 값 추가 후 전달
             * 전달 후 처리 xhr.onload
             */
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "./view_ok.php", true);
            const f1 = new FormData(document.modal_form);
            f1.append("idx", param["idx"]);
            f1.append("code", param["code"]);
            xhr.send(f1);

            xhr.onload = () => {

                if (xhr.status == 200) {
                    // 2-1 통신 성공
                    const response = JSON.parse(xhr.response); // 서버측에서 주는 값 전달 parse로 Key,Value 값으로 변경
                    if (response.result == "update_success") {
                        // result 값 : update_success
                        self.location.href = "./update.php?code=" + param["code"] + "&idx=" + param["idx"];
                    } else if (response.result == "delete_success") {
                        // result 값 : delete_success
                        alert("해당 글이 삭제되었습니다.");
                        self.location.href = "./list.php?code=" + param["code"];
                    } else if (response.result == "wrong_password") {
                        // result 값 : wrong_password
                        alert("비밀번호가 틀렸습니다.");
                        password.value = ""; // 비멀번호 비우기
                        password.focus(); // 비밀번호 input 에 포커스 주기
                    }
                } else {
                    // 2-2 통신 실패
                    alert("오류가 발생하였습니다. 다음에 다시 시도해주세요.");
                }
            }
        });
    </script>
</body>
</html>