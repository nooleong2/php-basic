<?php

/**
 * pagination 구현
 * total : 게시물의 총 수
 * limit : 게시물의 총 수
 * page_limit : 출력 페이지 수
 * page : 현재 페이지 
*/
function my_pagination($total, $limit, $page_limit, $page) {

    $start = ($page - 1) * $limit;
    
    $total_page = ceil($total / $limit); # 소수점 발생할 수 있기 때문에 올림 함수 사용 (총 페이지 수)

    /*
        1p 1 ~ 5
        2p 1 ~ 5
        3p 1 ~ 5
        4p 1 ~ 5
        5p 1 ~ 5
        6p 6 ~ 10
        7p 6 ~ 10
        8p 6 ~ 10
        9p 6 ~ 10
        10p 6 ~ 10
        11p 11 ~ 15
    */

    $start_page = ((floor(($page - 1) / $page_limit)) * $page_limit) + 1; # 버림 함수를 이용해서 1 ~ 5 페이지는 0 6 ~ 10 페이지는 1
    $end_page = $start_page + $page_limit - 1;
    if ($end_page > $total_page) {
        $end_page = $total_page;
    }

    $rs_str = "<a href='".$_SERVER["PHP_SELF"]."?page=1'>First</a>"; # 첫 페이지

    // 전 페이지
    $prev_page = $start_page - 1;
    if ($prev_page > 1) {
        $rs_str .= " <a href='".$_SERVER["PHP_SELF"]."?page=".$prev_page."'>Prev</a>";
    }

    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($page == $i) {
            $rs_str .= $i . " ";
        } else {
            $rs_str .= " <a href='".$_SERVER["PHP_SELF"]."?page=".$i."'>".$i."</a> ";
        }
        
    }

    // 다음 페이지
    $next_page = $end_page + 1;
    if ($next_page <= $total_page) {
        $rs_str .= " <a href='".$_SERVER["PHP_SELF"]."?page=".$next_page."'>Next</a> ";
    }

    if ($page < $total_page) {
        $rs_str .= "<a href='".$_SERVER["PHP_SELF"]."?page=".$total_page."'>Last</a>"; # 마지막 페이지
    }
    
    return $rs_str;
}