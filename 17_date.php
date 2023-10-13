<?php

    // 날짜 요일
    // 타임존 설정 내가 위치한 지역
    date_default_timezone_set("Asia/Seoul");

    // 날짜
    echo date("Y")."<br>"; // 4자리년도
    echo date("y")."<br>"; // 2자리 년도
    echo date("M")."<br>"; // Jan ~ Dec 월 영어로
    echo date("m")."<br>"; // // 01 ~ 12 월 0있는 월
    echo date("n")."<br>"; // 1 ~ 12 0 없는 월
    echo date("Y-m-d H:i:s")."<br>";

    echo "===========================<br>";

    // 요일
    echo date("D")."<br>"; // Mon ~ Sun
    echo date("N")."<br>"; // 요일 숫자로 표현(1(월) ~ 7(일))
    echo date("d")."<br>"; // 01 ~ 31
    echo date("j")."<br>"; // 1 ~ 31

    switch (date("N")) {
        case 1:
            $yoil = "월요일입니다."; 
            break;
        case 2:
            $yoil = "화요일입니다."; 
            break;
        case 3:
            $yoil = "수요일입니다."; 
            break;
        case 4:
            $yoil = "목요일입니다."; 
            break;
        case 5:
            $yoil = "금요일입니다."; 
            break;
        case 6:
            $yoil = "토요일입니다."; 
            break;
        case 7:
            $yoil = "일요일입니다."; 
            break;
        default:
            break;
    }

    echo "오늘의 요일 : ".$yoil."</br>";
?>