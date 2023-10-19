<?php

    require_once("./db.php");

    try {
        if ($_POST["mode"] == "input") {
            $subject = $_POST["subject"];

            $sql = "INSERT INTO todo (subject) VALUES (:subject);";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindParam(":subject", $subject);
            $rs = $stmt -> execute();
    
            if ($rs) {
                echo
                "
                    <script>
                        self.location.href = 'index.php';
                    </script>
                ";
            } else {
                echo
                "
                    <script>
                        alert('등록과정에서 오류가 발생하였습니다.');
                        history.go(-1);
                    </script>
                ";
            }
        } else if ($_POST["mode"] == "done") {
            $idx = $_POST["idx"];
            do_undo($idx, 1);
        } else if ($_POST["mode"] == "undone") {
            $idx = $_POST["idx"];
            do_undo($idx, 0);
        } else if ($_POST["mode"] == "delete") {
            $idx = $_POST["idx"];
            delete($idx);
        }
        

    } catch (PDOException $e) {
        $e -> getMessage();
    }

    function do_undo($idx, $status) {
        global $conn; # 외부에 있는 것을 사용하기 위해 글로벌 설정
        $sql = "UPDATE todo SET status = :status WHERE idx = :idx";
        $stmt = $conn -> prepare($sql);
        $stmt -> bindParam(":idx", $idx);
        $stmt -> bindParam(":status", $status);
        $stmt -> execute();

        indexPage();
    }

    function delete($idx) {
        global $conn;
        $sql = "DELETE FROM todo WHERE idx = :idx";
        $stmt = $conn -> prepare($sql);
        $stmt -> bindParam(":idx", $idx);
        $stmt -> execute();

        indexPage();
    }

    function indexPage() {
        echo
        "
            <script>
                self.location.href = 'index.php';
            </script>
        ";
    }

    $conn = null;
