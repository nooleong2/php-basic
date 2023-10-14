<?php

    // PHH JSON
    // PHP 연관배열 => JSON으로 처리
    $info = [
        "Peter" => 35,
        "Ben" => 37,
        "Joe" => 20,
    ];

    // echo json_encode($info);

    // decode
    $json = '
        {
            "Peter": 35,
            "Ben": 37,
            "Joe": 20
        }
    ';

    // false 일 경우 object 형태 default(생략 가능)
    $obj = json_decode($json, false);
    echo $obj -> Peter; # 객체 형태로 접근 key 값을 지정하면 value 값을 가져다 줌

    // true 일 경우 array 형태
    $arr = json_decode($json, true);
    echo $arr["Joe"];
    
    echo "<br><br>";

    // 반복문으로 전체 출력
    foreach ($arr as $key => $value) {
        echo $key.": ".$value."<br>";
    }

    foreach ($obj as $key => $value) {
        echo $key.": ".$value."<br>";
    }
?>