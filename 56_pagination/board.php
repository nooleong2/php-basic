<?php
    require_once("./db.php");
    require_once("./lib.php");

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

    // print_r($rows); # 데이터 확인

    echo "<table border='1'>";
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

    $conn = null;

    
