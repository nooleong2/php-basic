<?php 
    // 비동기 ajax
    /*
        전체적인 페이지 로딩을 하지 않고 비동기적으로 데이터를 가져와 부분적인 사이트의 변경할 수 있는 기술
     */

     require_once("50_db_module.php");

     try {
        if ((isset($_POST["uname"])) || (isset($_POST["email"]))){
            
            $uname = $_POST["uname"];
            $email = $_POST["email"];

            $sql = "INSERT INTO member (uname, email) VALUES ('".$uname."', '".$email."')";
            $conn -> exec($sql);

            echo "회원 등록 성공";

        } else {
            echo "NO";
        }
        
        
     } catch (PDOException $e) {
        echo $e -> getMessage();
     }

     $conn = null;
?>