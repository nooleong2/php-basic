<?php
require_once("./db.php");
require_once("./board_bootstrap_lib.php");

// 게시물 총 개수
$sql = "SELECT COUNT(*) AS cnt FROM freeboard";
$stmt = $conn -> prepare($sql);
$stmt -> execute();
$rs = $stmt -> fetch(PDO::FETCH_ASSOC);

$total = $rs["cnt"];
$limit = 10;
$page_limit = 5;
$page = isset($_GET["page"]) && $_GET["page"] != "" && is_numeric($_GET["page"]) ? $_GET["page"] : 1;

$start = $limit * ($page - 1);

// 게시물 전체 호출
$sql = "SELECT * FROM freeboard ORDER BY idx DESC LIMIT {$start}, {$limit}";
$stmt = $conn -> prepare($sql);
$stmt -> execute();
$rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Board Pagination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  
    <div class="container">
        <?php
            echo "<table class='table table-hover'>";
            echo
            "
                <tr>
                    <th>번호</td>
                    <th>제목</td>
                    <th>내용</td>
                    <th>등록일</td>
                </tr>
            ";
            foreach ($rows as $row) {
                echo
                "
                    <tr>
                        <td>".$row["idx"]."</td>
                        <td>".$row["subject"]."</td>
                        <td>".$row["content"]."</td>
                        <td>".$row["rdate"]."</td>
                    </tr>
                ";
            }
            echo "<table>";
            
            $rs_str = my_pagination($total, $limit, $page_limit, $page);
            echo $rs_str;
        ?>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>