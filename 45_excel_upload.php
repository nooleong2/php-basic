<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 
        Excel 데이터 DATABASE 삽입

        <순서>
        1. EXCEL CSV 저장
        2. 데이터베이스 생성
        3. 테이블 생성
        4. 업로드 Form 화면 구성
        5. 처리 부분 코딩
        6. 확인
    -->

    <form name="upload_form" action="45_excel_upload_ok.php" method="POST" enctype="multipart/form-data">
        <label for="">파일 업로드 :</label>
        <input type="file" name="file" id="file"><br>
        <button id="submit_btn">파일 업로드</button>
    </form>

    <!-- 파일 선택 안했을 시 방지-->
    <script>
        const btn = document.querySelector("#submit_btn");
        btn.addEventListener("click", (e) => {
            e.preventDefault(); // 옵션 발생 방지

            const csv = document.querySelector("#file");
            if (csv.value == "") {
                alert("파일을 선택해주세요");
                return false;
            }

            document.upload_form.submit();
        })
    </script>

</body>
</html>