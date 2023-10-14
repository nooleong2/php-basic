<?php

    // callback function
    /*
        함수에다가 다른 함수를 넣는 것을 말함
    */

    function my_callback($item) {
        return strlen($item); # 문자열 길이
    }

    $strings = array("apple", "orange", "pear", "pineapple");
    // 내장 함수 사용
    $lengths = array_map("my_callback", $strings); # 콜백함수, 배열을 넣는 구조

    print_r($lengths);

    // 사용자 정의 콜백 함수
    function exclaim($name, $str) {
        return $name."님, ".$str."! <br>";
    }

    function ask($name, $str) {
        return $name."님, ".$str."? <br>";
    }

    function print_formatted($name, $str, $format) {
        echo $format($name, $str);
    }

    print_formatted("Tom", "안녕하세요", "exclaim");
    print_formatted("Mike", "어디가세요", "ask");

?>