<?php
    // TODO LIST
    require_once("./db.php");

    try {

        $sql = "SELECT * FROM todo ORDER BY idx DESC;";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        $e -> getMssage();
    }

    $conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>할 일 관리</title>

    <script defer src="./todolist.js"></script>
</head>
<body>
    <form name="todo_form" action="todolist_ok.php" method="POST" autocomplete="off">
        <input type="hidden" name="mode" value="input">
        할일 : <input type="text" name="subject" id="subject">
        <input type="button" id="todo_btn" value="등록">
    </form>
    <table border="1" width="400">
        <?php
            foreach ($rows as $row) {

                if ($row["status"] == 1) {
                    $class = "style='text-decoration: line-through'";
                    $btn = "<button onclick='todoUnChecked(".$row['idx'].")'>취소</button>";
                } else {
                    $class = "";
                    $btn = "<button onclick='todoChecked(".$row['idx'].")'>확인</button>";
                }
                echo 
                "
                    <tr>
                        <td ".$class.">".$row['subject']."</td>
                        <td>".$btn."</td>
                        <td><button onclick='todoDel(".$row['idx'].")'>삭제</button></td>
                    </tr>
                ";
            }
        ?>
    </table>

    <!-- 수정 / 삭제 등 여러가지로 사용하기 위해 만듬 안보이는 폼 태그 -->
    <form id="multiform" action="todolist_ok.php" method="POST">
        <input type="hidden" name="idx"> <!-- JS에서 value 값 컨트롤 -->
        <input type="hidden" name="mode"> <!-- JS에서 value 값 컨트롤 -->
    </form>
</body>
</html>