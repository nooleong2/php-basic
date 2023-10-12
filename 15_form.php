<?php 

    // form 데이터 $_POST로 받기
    $title = $_POST["title"];
    $content = $_POST["content"];

    echo "작성하신 글 제목 : ".$title."<br>";
    echo "작성하신 글 내용 : ".nl2br($content)."<br>"; # br을 자동으로 넣어주는 nl2br PHP 내장 함수

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 다루기</title>
</head>
<body>
    <h2>form 다루기</h2>
    <form id="form1" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" autocomplete="off"> <!-- 현재 내 페이지로 전달 $_SERVER["PHP_SELF"] 사용 -->
        글 제목: <input type="text" name="title"> <br />
        글 내용: <textarea name="content" cols="30" rows="5"></textarea> <br />
        <button type="button" id="btn">전송</button> <!-- form 안에 버튼이 있을 경우 default type = submit 이다 -->
    </form>

    <script>
        const btn = document.querySelector("#btn"); // html에서 button을 찾는다 id 값으로
        
        btn.addEventListener("click", () => { // button이 클릭 됬을 때 event 발생
            form = document.querySelector("#form1"); // form을 찾는다

            if (form.title.value == "") { // 찾은 form의 타이틀의 값이 없으면 true
                alert("제목을 입력해주세요"); // 경고창 출력
                form.title.focus(); // 해당 위치에 포커스
                return; // submit으로 안넘어가고 다시 리턴해준다.

            } else if (form.content.value =="") {
                alert("내용을 입력해주세요");
                form.content.focus();
                return;
            }

            form.submit(); // 전송
        });
    </script>
</body>
</html>