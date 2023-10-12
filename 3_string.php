<?php 

    // 출력함수, 문자열 길이, 문자열 뒤집기, 문자열 찾기

    // 출력 함수
    echo "1";
    print "2";

    echo("3");
    print("4<br>");

    // Mark Up 같이 사용
    echo "<h2>Hello PHP</h2>";
    echo "Hello World<br>";

    // 변수랑 같이 사용
    $txt = "Learn PHP";
    echo "<h2>".$txt."</h2>"; # 연결문자는 .(도트)로 연결
    
    $x = 5;
    $y = 3;
    echo "result: ".$x + $y."<br>";

    // 타입 확인
    $num = 1234;
    var_dump($num); # int
    echo "<br>";
    var_dump($txt); # string 
    echo "<br>";
    $kor = "한글";
    var_dump($kor); # 한글일 경우 1글자당 3bytes씩
    echo "<br>";
    $pi = 3.14; # float
    var_dump($pi);
    $is_true = false; # boolean
    var_dump($is_true);
    echo "<br>";

    // 문자열 길이 반환
    $str_len = strlen("한글짱");
    echo "반환 글자 수 바이트 : ".$str_len."<br>"; # bytes 수 반환

    // 문자열 뒤집기
    echo strrev("Hello World");
    echo "<br>";

    // 문자열 찾기
    $position = strpos("Hello World", "World");
    echo "문자 찾은 위치 맨 앞자리 index 값 : ".$position; # 찾은 문자열의 맨 앞 index 번호 반환(대소문자 구분)

?>