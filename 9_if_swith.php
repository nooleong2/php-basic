<?php

    // 조건문(if, switch)
    
    $grade = 2;
    $ban = 1;
    // if 조건문
    // 1학년 일 때만 1반 2반 을 호출 해줌
    // 2, 3학년은 본인들이 반을 알기 때문에 호출 안해 줌
    if ($grade == 1) {
        echo "1학년 입니다.<br>";
        // 중첩 조건문
        if ($ban == 1) {
            echo "1반 입니다.<br>";
        } else if ($ban == 2) {
            echo "2반 입니다.<br>";
        }
    } else if ($grade == 2) {
        echo "2학년 입니다.<br>";
    } else if ($grade == 3) {
        echo "3학년 입니다.<br>";
    } else {
        echo "잘못된 입력 값입니다.<br>";
    }

    // switch 조건문
    // break 를 걸어주지 않으면 밑에 다른 case문 break를 만나기 전까지 실행
    $season = "겨울";
    switch ($season) {
        case "봄":
            echo "날씨가 좋아요!";
            break;
            
        case "여름":
            echo "날씨가 더워요!";
            break;

        case "가을":
            echo "날씨가 좋아요!";
            break;

        case "겨울":
            echo "날씨가 추워요!";
            break;

        default:
            echo "잘못된 입력 값입니다.";
            break;
    }
?>