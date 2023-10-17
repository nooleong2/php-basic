<?php

    // 등록된 게시물 페이지

    include "44_form_database_module.php";

    // 데이터 삽입 후 넘어온 게시물 아이디
    $idx = $_GET["idx"];

    try {

        // SELECT Query
        $sql = "SELECT * FROM board WHERE idx = ".$idx;

        $stmt = $conn -> prepare($sql);
        $stmt -> execute();

        // 하나의 데이터만 가져올 때 fetch 사용
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);

    } catch (PDOExcpetion $e) {
        echo $e -> getMessage();
    }

    $conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row["subject"] ?></title>
</head>
<body>
    <div>
        <span>글 번호 : <?php echo $row["idx"] ?>번</span><br>
        <span>글 등록일 : <?php echo $row["rdate"] ?></span>
    </div>
    <br>
    글 제목: <input type="text" name="subject" id="subject" value=<?php echo $row["subject"] ?> readonly><br><br>
    글 내용: <textarea name="subject" id="subject" cols="30" rows="10" readonly><?php echo $row["content"] ?></textarea>
</body>
</html>

