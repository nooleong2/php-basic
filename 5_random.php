<?php

    // 난수발생, 반올림, 절대값, 상수, 파이

    // abs() : 절대 값
    echo abs(-33)."<br>"; # 33

    // sqrt() : 루트 값
    echo sqrt(16)."<br>"; # 4

    // round() : 반 올림
    echo round(3.14)."<br>"; # 3
    echo round(3.52)."<br>"; # 4

    // rand() : 난 수
    echo rand(1, 10)."<br>"; # PHP의 경우 정수로 난 수 생성 (범위)

    // define() : 상수
    define("GREETING", "안녕하세요");
    define("GOODBYE", "안녕히가세요");

    // GREETING = "TEXT"; # 값을 할당 할 수 없다.

    echo GREETING."<br>";
    echo GOODBYE."<br>";

    define("GOODBYE", "BYE"); # 같은 이름의 상수를 재정의하더라도 값이 바뀌지 않는다.
    echo GOODBYE."<br>";
    

?>