<?php

    // Exception 예외처리
    /*
        에러가 날 경우를 대비해서 try catch 로 감싸서 작업
        단 모든 구문을 try catch로 작업하는 것은 불필요 하다
    */

    function divide($num1, $num2) {
        if ($num2 == 0) {
            # Exception 던지기
            throw new Exception("Division by zero");
        }
        return $num1 / $num2;
    }

    try {
        echo divide(5, 0);
    } catch (Exception $e) {
        $code = $e -> getCode();
        $message = $e -> getMessage();
        $file = $e -> getFile();
        $line = $e -> getLine();

        echo $code.": <br>";
        echo $message.": <br>";
        echo $flle.": <br>";
        echo $line.": <br>";

        echo $e; # 다 나옴
    } finally {
        // echo "<br>무조건 실행 되는 구문 에러가 나든 안나든";
    }

?>