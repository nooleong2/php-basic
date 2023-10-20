<?php
    /**
     * 여러군데에서 쓰이기 때문에 공통으로 처리
     * 하나의 게시판으로 사용하는것이 아니라 여러가지 게시판으로 사용하기 위한 작업
     */

    $code = (isset($_GET["code"]) && $_GET["code"] != "" ? $_GET["code"] : "");

    // $code 값에 따른 게시판 사용
    switch ($code) {
        case "freeboard" : 
            $board_title = "자유 게시판 "; 
            break;
        case "notice" : 
            $board_title = "공지사항 "; 
            break;
        default :
            $code = "free";
            $board_title = "자유 게시판";
            break;
    }