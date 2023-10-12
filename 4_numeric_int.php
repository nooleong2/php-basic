<?php

    // 숫자 문자를 구분하는 is_numeric함수, is_int 함수와 어떤 차이인지

    // 문자열 바꾸기
    $str = "I want to study English";

    $study_to_learn = str_replace("study", "learn", $str); # 기존 단어, 변경 단어, 해당 문자열
    echo $study_to_learn."<br>";

    // is_int 정수 타입 확인
    $x = 3;
    $y = "hello";
    echo var_dump(is_int($y))."<br>"; # 맞으면 1을 반환 아니면 아무것도 반환 안함
    // is_float 실수 타입 확인
    $pi = 3.14;
    echo is_float($pi)."<br>";
    // is_numeric 숫자인지 아닌지 판단
    $is_num = 3;
    echo is_numeric($is_num)."<br>"; # numeric의 경우 문자열 숫자를 작성해도 숫자로 인식 : "3" == true

    // pie(), min(), max()
    echo "가장 큰 숫자 : ".min(1, 2, 3, 4, 5)."<br>";
    echo "가장 작은 숫자 : ".max(5, 6, 7, 8, 9, 0)."<br>";
    $pie = pi();
    echo "파이 : ".$pie."<br>";
    
?>