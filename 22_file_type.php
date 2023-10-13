<?php

    // 파일 확장자 구하기
    
    // explode() : 지정된 문자로 문자열을 잘라서 배열을 만들게 도와줌
    $str = "a,b,c,d";
    $arr = explode(",", $str); # 자르고자 하는 문자, 해당 문자열
    print_r($arr);
    echo "<br/>";

    // 배열 크기를 구하는 함수 count
    echo count($arr)."<br>"; # count == length랑 동일

    // end() : 배열의 마지막 값을 리턴
    echo end($arr)."<br>";

    // 확장자 구하기
    $file_name = "aaa.jpg";
    $arr = explode(".", $file_name);
    $type = end($arr);

    echo "확장자 : ".$type."입니다.<br>";

    // 확장자 구하기 함수 생성
    function get_file_type($filename) {
        
        $arr = explode(".", $filename);
        return end($arr);
    }

    // 확장자 함수 사용
    $filename = "thisisfile.png";
    $ext = get_file_type($filename);

    echo "[함수 사용] 확장자 : ".$ext."입니다.";

?>