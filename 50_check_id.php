<?php 
    // 비동기 ajax
    /*
        전체적인 페이지 로딩을 하지 않고 비동기적으로 데이터를 가져와 부분적인 사이트의 변경할 수 있는 기술
     */

     require_once("50_db_module.php");

     try {
        if (isset($_GET["id"])){
            $uname = $_GET["id"];
            $sql = "SELECT COUNT(*) cnt FROM member WHERE uname = '".$uname."'"; # 중복 체크 문 MySQL COUNT 내장 함수 사용 동일 값의 개수를 반환
            
            $stmt = $conn -> prepare($sql);
            $stmt -> execute();

            $row = $stmt -> fetch(PDO::FETCH_ASSOC);

            $arr = array("result" => $row["cnt"] ? "exist" : "not_exist");

            die(json_encode($arr)); # echo 하고 종료
        }
        
        
     } catch (PDOException $e) {
        echo $e -> getMessage();
     }

     $conn = null;
?>