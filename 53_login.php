<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="53_sql_injection.php" method="POST">
        아이디: <input type="text" name="id"><br>
        비밀번호: <input type="text" name="passwd"><br> <!-- 연습을 위해 type을 text로 처리 -->
        <input type="submit" value="로그인"><br>
    </form>
</body>
</html>