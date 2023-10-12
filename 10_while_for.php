<?php

    // 반복문

    // while (반복 횟수가 지정되어있지 않을 때)
    $status = true;
    $i = 1;

    while ($status) { # true 이면 계속 반복문 실행
        global $i; # 전역변수 $i 사용

        echo $i."번 입니다.<br>"; # 전역변수 $i 사용
        $i++; # 전역변수 $i를 반복문 돌때 마다 1씩 증가

        global $status; # 전역변수 $status 사용
        if ($i == 10) { # $i가 10이랑 같으면
            $status = false; # $status 는 false
        }
    }
    # status가 false가 되면서 정료 문자 호출
    echo "반복문이 종료되었습니다.<br>";

    // for (반복 횟수가 지정되었을 때)
    // 구구단
    for ($i = 2; $i < 10; $i++) {
        for ($j = 1; $j < 10; $j++) {
            echo $i."x".$j."=".$i*$j."<br>";
        }
        echo "<br>";
    }

    $colors = array("red", "blue", "yello"); # 배열
    foreach ($colors as $color) { # 반복할 변수 as 받을 변수
        echo $color."<br>";
    }
    

?>