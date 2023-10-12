<?php

    // 인덱스 배열, 연관 배열, 다차원 대열

    /* 인덱스 배열 */
    // 배열 생성
    $colors = array("red", "blue", "green", "yellow", "black");
    $colors2 = $colors; # colors의 배열을 같이 사용하는것이 아니라 복사해서 사용한다고 이해 하면 될듯

    $colors2[0] = "white"; # colors index 0 번째인 값을 white로 변경

    # 배열의 인덱스 번호와 같이 호출 할때 사용
    print_r($colors); # red, blue, green, yellow, black
    print_r($colors2); # white, blue, green, yellow, black

    // index 배열 : 0 부터 시작
    echo $colors[0]."<br>";
    echo $colors[1]."<br>";
    echo $colors[2]."<br>";
    echo $colors[4]."<br>";

    // foreach로 배열 호출
    foreach ($colors as $color) {
        echo $color."<br>";
    }

    // PHP 7.x 버전 이후 []로 지원
    $arr = [1,2 ,3 ,4, 5];
    foreach ($arr as $a) {
         echo $a."<br>";
    }

    /* 연관 배열 */
    // 연관 배열 key:value
    $cabinet = array(
        "A1" => "Mike",
        "A2" => "Duke",
        "B5" => "Andy",
        "A100" => 100,
    );

    # value 값 호출
    echo $cabinet["A100"]."<br>";

    # key, value 모두 호출
    foreach($cabinet as $key => $val) {
        echo "캐비넷 번호 : ".$key.", 사용자 : ".$val."<br>";
    }

    /* 다차원 배열 (2차원 배열) */
    $cars = array(
        array("볼보", 22, 10, true),
        array("산타페", 25, 4, false),
        array("아우디", 12, 11, true),
    );

    echo $cars[1][0]."의 재고 : ".$cars[1][1]."개 입니다.<br>";
    echo "<br>";

    // 반복문을 이용한 다차원 배열 출력
    echo "<table border=\"1\">
        <tr>
            <th>차종</th>
            <th>재고량</th>
            <th>판매량</th>
            <th>단종</th>
        </tr>
    ";
    for ($i = 0; $i < sizeof($cars); $i++) {
        echo "<tr>";
        for ($j = 0; $j < sizeof($cars[$i]); $j++) {
            echo "<td>".$cars[$i][$j]."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";


    /* 배열 정렬 내장 함수 */
    $fruits = array("apple", "pear", "banana", "watermelon", "tomato");

    // sort() - 배열을 오름차순으로 정렬
    sort($fruits); # 정렬한 후 변수에 담는것이 아니라 직접 정렬을 한다고 이해
    print_r($fruits);
    echo "<br>";

    // rsort() - 배열을 내림차순으로 정렬
    rsort($fruits);
    print_r($fruits);
    echo "<br>";

    // asort() - 값에 따라 연관 배열을 오름차순으로 정렬
    $age = array(
        "A" => 30,
        "C" => 35,
        "B" => 5,
        "D" => 13
    );
    asort($age);
    print_r($age);
    echo "<br>";

    // ksort() - 키에 따라 연관 배열을 오름차순으로 정렬
    ksort($age);
    print_r($age);
    echo "<br>";
    
    // arsort() - 값에 따라 연관 배열을 내림차순으로 정렬
    arsort($age);
    print_r($age);
    echo "<br>";

    // krsort() - 키에 따라 연관 배열을 내림차순으로 정렬
    krsort($age);
    print_r($age);
    echo "<br>";
?>