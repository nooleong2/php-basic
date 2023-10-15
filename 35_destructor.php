<?php

    // 소멸자 (destructor)

    class Car {
        private $name; // 자동차 이름
        private $color; // 자동차 색상

        // 생성자
        function __construct($name, $color) {
            $this -> name = $name;
            $this -> color = $color;

            echo "<p>자동차가 생산되었습니다.</p>";
            echo "<p>이름 : {$this -> name}<br>색상 : {$this -> color}</p>";
        }

        // 소멸자
        /*
            객체가 소멸 될 때 생성되는 메소드
            php 파일이 끝나는 지점에서 생성자가 소멸 됩니다.
            소멸자는 자동으로 호출 되지만 사용자 지정도 가능함
        */
        function __destruct() {
            echo "<p>자동차가 폐차 되었습니다.</p>";
        }
    }

    $volvo = new Car("Volvo", "Red");

    unset($volvo); # 사용자 지정으로 객체 삭제
    echo "<p>프로그램 실행 중</p>";