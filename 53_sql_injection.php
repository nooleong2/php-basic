<?php 

    // SQL INJECTION 재현을 통한 대비

    $servername = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "php_db";

    try {

        $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $passwd);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo $e -> getMessage();
        exit;
    }

    try {

        if (isset($_POST["id"]) && isset($_POST["passwd"]) && $_POST["id"] != "" && $_POST["passwd"] != ""){
            $username = $_POST["id"];
            $passwd = $_POST["passwd"];

            /*
                문자열 합침으로 작업할 경우 SQL 인젝션에 취약하다
                취약한 이유 문자열이 들어오기 때문에 아이디값에 연산자를 통한 OR 연산자를 이용해 or 1 = 1(참 이되면 통과해서 로그인이 되는 경우)
                
                그래서 바인딩으로 처리해서 작업하는것이 SQL 인젝션에 대비할 수 있다.
             */
            // $sql = "SELECT * FROM user WHERE username ='".$username."' AND passwd='".$passwd."'";
            $sql = "SELECT * FROM user WHERE username = :username AND passwd = :passwd";

            $stmt = $conn -> prepare($sql);
            $stmt -> bindParam(":username", $username);
            $stmt -> bindParam("passwd", $passwd);
            $stmt -> execute();
            $row = $stmt -> fetch(PDO::FETCH_ASSOC);
            
            var_dump($row);
            
        } else {
            echo "값 없음";
        }
        

    } catch (PDOException $e) {
        echo $e -> getMessage();
        exit;
    }

    $conn = null;
?>