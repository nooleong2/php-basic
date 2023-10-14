<?php

    // 필터를 이용한 각종 입력 값 검사
    /*
        필터를 사용하는 이유
        외부로부터 들어오는 데이터에 잘못된 내용이 있으면 보안 문제가 발생하고
        웹 페이지가 손상될 수 있기 때문에 항상 외부로 들어오는 데이터에 대해서 검증
    */

    // 필터 종류
    foreach (filter_list() as $id => $filter) {
        echo $filter."<br>";
    }

    echo "<hr />";

    // email 검증
    $email = "fake@ddd.com";
    $email_valid = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email_valid) {
        echo $email.": 검증에 성공했습니다.<br>";
    } else {
        echo $email.": 검증에 실패했습니다.<br>";
    }

    // 정수 검증 (0포함)
    $num = "1@com";
    $num_valid = filter_var($num, FILTER_VALIDATE_INT);
    if (filter_var($num, FILTER_VALIDATE_INT) === 0 || !filter_var($num, FILTER_VALIDATE_INT) == false) {
        echo $num.": 검증에 성공했습니다.<br>";
    } else {
        echo $num.": 검증에 실패했습니다.<br>";
    }

    // ip 검증
    $ip = "127.0.0.1.78"; # 본인 컴퓨터 아이피
    $ip_valid = filter_var($ip, FILTER_VALIDATE_IP);
    if ($ip_valid) {
        echo $ip.": 검증에 성공했습니다.<br>";
    } else {
        echo $ip.": 검증에 실패했습니다.<br>";
    }

    // 추가 비교 값 검증
    $int = 133;
    $min = 1;
    $max = 200;

    if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_rage" => $min, "max_rage" => $max))) === false) {
        echo "범위를 벗어납니다.<br>";
    } else {
        echo "범위 안에 들어와 있습니다.<br>";
    }

?>