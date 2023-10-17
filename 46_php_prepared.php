<?php
    
    // PHP MySQL Prepared Statements
    /*
        1. Query 구문 분석을 1회만 수행
        2. 매개 변수만 전달하기 때문에 서버 대역폭 최소화
        3. SQL Injection 공격을 막아줌
     */

     $servername = "localhost";
     $username = "root";
     $passwd = "";
     $dbname = "php_db";

     try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passwd);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     } catch (PDOException $e) {
        echo $e -> getMessage();
     }

     try {

        // prepare insert 구분
        // 1. query 구문 1번만 실행
        $stmt = $conn -> prepare("INSERT INTO member (uname, email) 
                                    VALUES (:uname, :email)");
        
        // 2. 먼저 바인딩을 시켜 놓음
        $stmt -> bindParam(":uname", $uname);
        $stmt -> bindParam(":email", $email);

        // 3. 매개 변수만 받아서 처리
        $uname = $_POST["username"];
        $email = $_POST["email"];

        $stmt -> execute();
        echo "데이터 삽입 완료<br>";
     } catch (PDOException $e) {
        echo $e -> getMessage();
     }

     $conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
     <input type="text" name="username"><br>
     <input type="text" name="email"><br>
     <button>전송</button>
   </form>
</body>
</html>