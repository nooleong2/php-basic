<?php

    // 내장 함수
    // 앞에서 썻던 min(), max(), rand() 모든게 다 PHP가 가지고있는 함수
    $money = 3000;
    $pi = pi();
    echo number_format($money)."<br>";
    echo $pi."<br>";

    // 사용자 함수
    // parameter가 없는 함수 생성
    function greeting_php() {
        echo "Hello PHP Welcom to Programing<br>";
    }

    greeting_php(); # called

    // parameter가 존재하는 함수 생성
    function greeting_lang($lang) {
        echo "Hello ".$lang."<br>";
    }

    greeting_lang("PHP"); # called
    greeting_lang("Java"); # called
    greeting_lang("Python"); # called

    // parameter가 여러개 존재하는 함수 생성
    function add($num1, $num2) {
        echo $num1."+".$num2."=".$num1+$num2."<br>";
    }

    add(10, 20); # called
    add(5, 5); # called

    # (+, -, *, /) 만 가능한 계산기
    function calc($num1, $num2, $etc) {

        if ($etc === "+") {
            echo $num1." + ".$num2." = ".$num1+$num2."<br>";
        } else if ($etc === "-") {
            echo $num1." - ".$num2." = ".$num1-$num2."<br>";
        } else if ($etc === "*") {
            echo $num1." x ".$num2." = ".$num1*$num2."<br>";
        }  else if ($etc === "/") {
            echo $num1." / ".$num2." = ".$num1/$num2."<br>";
        } else {
            echo "부호가 잘못 되었습니다.<br>";
        }
    }

    calc(10, 20, "+");
    calc(50, 20, "-");
    calc(2, 50, "*");
    calc(100, 20, "/");

    // 반환 값이 있는 함수 생성
    // 옷을 추천해주는 함수
    function recomand_clothes($weather) {
        switch ($weather) {
            case "봄":
                return "가디건 하나 챙기셔도 좋을거같아요";
                break;
            
            case "여름":
                return "반팔, 반바지 차림으로 나가세요";
                break;
                

            case "가을":
                return "후드티, 니트, 맨투맨 입고 나가셔도 좋아요";
                break;

            case "겨울":
                return "패딩 입고 나가셔야 됩니다.";
                break;

        }
    }

    $clothes = recomand_clothes("여름");
    echo $clothes;

    // 파라미터 타입 지정, 반환값 지정 : 뒤에 나오는 것이 반환 값
    // 타입이 틀릴 경우 TypeError 발생
    function add_number(int $num1, int $num2) : int {
        return $num1 + $num2;
    }

    echo add_number(10, 20);
?>