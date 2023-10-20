<?php
    // 공통 사용
    include "./config/db_config.php"; # DB
    include "./config/page_config.php"; # PAGINATION
    include "./config/config.php"; # CODE

    /**
     * 검색 기능 추가
     */
    $sn = ( isset($_GET["sn"]) && $_GET["sn"] != "" ) ? $_GET["sn"] : "";
    $sf = ( isset($_GET["sf"]) && $_GET["sf"] != "" ) ? $_GET["sf"] : "";

    $like_query = "";
    $params = [];
    if ($sn != "" && $sf != "") {
        switch ($sn) {
            case 1:
                $like_query = " AND (subject LIKE CONCAT('%', :sf, '%') OR content LIKE CONCAT('%', :sf2, '%'))"; // 제목 + 내용
                $params = [":sf" => $sf, "sf2" => $sf];
                break;
            case 2:
                $like_query = " AND (subject LIKE CONCAT('%', :sf, '%'))"; // 제목
                $params = [":sf" => $sf];
                break;
            case 3:
                $like_query = " AND (content LIKE CONCAT('%', :sf, '%'))"; // 내용
                $params = [":sf" => $sf];
                break;
            case 4:
                $like_query = " AND (name = :sf)"; // 작성자
                $params = [":sf" => $sf];
                break;
        }
    }

    /**
     * 페이지네이션 처리
     * $limit : 몇 페이지에 보이게 할 것 인지
     * $page_limit : 한 페이지당 몇개의 게시물을 보여줄 것 인지
     * $current_page : 현재 페이지가 몇번 페이지 인지
     * $start : 몇 번째부터 가져 올지
     * $total : 총 데이터 수
     */

    $limit = 5;
    $page_limit = 5;
    $current_page = (isset($_GET["page"]) && $_GET["page"] != "" && is_numeric($_GET["page"])) ? $_GET["page"] : 1;
    $start = ($current_page - 1) * $limit;
    
    $sql = "SELECT COUNT(*) AS cnt FROM mboard WHERE code='".$code."'".$like_query.";";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute($params);
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $total = $row["cnt"];

    /**
     * 테이블 값 처리
     * 데이터 하나만 불러 올 때는 fetch()
     * 데이터 다 가져 올 때는 fetchAll()
     */

    $sql = "SELECT * FROM mboard WHERE code='".$code."'".$like_query." ORDER BY idx DESC LIMIT $start, $page_limit";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute($params);
    $rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    $conn = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $board_title?> 리스트</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- 제목 -->
    <div class="container mt-3">
        <h1> <?= $board_title?></h1>
    </div>

    <!-- 검색 -->
    <div class="container mt-3 d-flex gap-2 w-50">
        <select class="form-select w-25" id="sn">
            <option value="1" <?= ($sn == "1") ? "selected" : "" ?>>제목+내용</option>
            <option value="2" <?= ($sn == "2") ? "selected" : "" ?>>제목</option>
            <option value="3" <?= ($sn == "3") ? "selected" : "" ?>>내용</option>
            <option value="4" <?= ($sn == "4") ? "selected" : "" ?>>작성자</option>
        </select>
        <input type="text" class="form-control w-75" id="sf" value="<?= $sf ?>">
        <button class="btn btn-primary w-25" id="btn_search">검색</button>
    </div>

    <!-- 테이블 -->
    <div class="container mt-3">
        <table class="table table-bordered table-hover">
            <!-- col 가로 크기 조정 -->
            <colgroup>
                <col width="7%">
                <col width="63%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
            </colgroup>
            <!-- 테이블 제목 -->
            <thead class="text-bg-primary text-center">
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>등록일</th>
                    <th>조회수</th>
                </tr>
            </thead>
            <!-- PHP 반복문을 이용해 데이터 노출 -->
            <?php foreach ($rows as $row) {?>
                <tr id="view_details" data-idx="<?= $row["idx"]?>" data-code="<?= $code?>">
                    <td class="text-center"><?= $row["idx"] ?></td>
                    <td style="cursor:pointer;"><?= $row["subject"] ?></td>
                    <td class="text-center"><?= $row["name"] ?></td>
                    <td class="text-center"><?= substr($row["rdate"], 0, 10) ?></td> <!-- 0 ~ 10자리 까지 문자열 짜름 -->
                    <td class="text-center"><?= $row["hit"] ?></td>
                </tr>
            <?php }?>
        </table>

        <!-- 페이지/글쓰기 버튼 -->
        <div class="mt-3 d-flex justify-content-between align-items-start">
            <!-- 페이지네이션 -->
            <div>
                <?php
                    $param = "?code=".$code;
                    // 검색 기능 추가
                    if ($sn != "") {
                        $param .= "&sn=".$sn;
                    }
                    if ($sf != "") {
                        $param .= "&sf=".$sf;
                    }
                    $rs_str = my_pagination($total, $limit, $page_limit, $current_page, $param);
                    echo $rs_str;
                ?>
            </div>

            <!-- 글쓰기 버튼 -->
            <div>
                <button class="btn btn-primary" id="btn_write">글쓰기</button>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script>

            // 글쓰기 버튼 핸들링
            const btn_write = document.querySelector("#btn_write");
            btn_write.addEventListener("click", () => {
                self.location.href = "./write.php?code=<?= $code?>";
            });

            // 테이블의 디테일 페이지 갈 수 클릭 핸들링
            const view_details = document.querySelectorAll("#view_details");
            /**
             * view_details 의 경우 부모에게 먹여져 있기때문에 자식까지 다중 선택
             * 반복문을 통해 하나씩 클릭 이벤트 발생
             */
            view_details.forEach( (view_detail) => {
                view_detail.addEventListener("click", () => {
                    self.location.href = "./view.php?code=" + view_detail.dataset.code + "&idx=" + view_detail.dataset.idx;
                });
            });

            // 검색 버튼 클릭시 이벤트 발생
            const btn_search = document.querySelector("#btn_search");
            btn_search.addEventListener("click", () => {
                const sn = document.querySelector("#sn"); // select
                const sf = document.querySelector("#sf"); // input

                if (sf.value == "") {
                    alert("검색어를 입력해주세요.");
                    sf.focus();
                    return;
                }

                const splited = window.location.search.replace("?", "").split(/[=?&]/);
                let param = {};
                for (let i = 0; i < splited.length; i++) {
                    param[splited[i]] = splited[++i];
                }
                
                self.location.href = "./list.php?code=" + param["code"] + "&sn=" + sn.value + "&sf=" + sf.value; // GET 방식으로 전송
            });
        </script>
    </div>
</body>
</html>