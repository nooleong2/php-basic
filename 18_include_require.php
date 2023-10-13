<?php

    // include, required (파일 삽입)
    /*
        파일을 공통으로 사용하기 위해
        하나의 페이지로 관리해서 유지보수 시 유용하다

        include와 required의 차이
        include 의 경우 warning 떠드라도 프로그램이 멈추지 않는다.
        required의 경우 warning이 뜨고 에러를 뛰워서 프로그램이 멈춘다.

        또 

        include 는 if 문으로 파일을 삽입이나 삽입 안함 할 수 있지만
        required의 경우는 일단 삽입을 하기 때문에 include가 유연하다
    */

    include "common.php";
?>
