<?php

    // 비교 연산자
    $num1 = 10;
    $num2 = 11;

    var_dump($num1 == $num2); # 같으면 true, 다르면 false
    var_dump($num1 <> $num2); # 다르면 true, 같으면 false (!=랑 동일)

    $num3 = "1";
    $num4 = "1";
    var_dump($num3 === $num4); # 타입까지 같으면 true, 다르면 false
    var_dump($num3 !== $num4); # 타입이 다르면 true, 같으면 false

    $num5 = 1;
    $num6 = 2;
    var_dump($num5 < $num6); # $num5 가 $num6 보다 작으면 true, 아니면 false
    var_dump($num5 > $num6); # $num5 가 $num6 보다 크면 true, 아니면 false
    var_dump($num5 <= $num6); # num5 가 $num6 보다 작거나 같으면 true, 아니면 false
    var_dump($num5 >= $num6); # num5 가 $num6 보다 크거나 가으면 true, 아니면 false 

    

?>