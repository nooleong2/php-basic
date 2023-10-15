<?php
    // 클래스 상수 (const)

    /*
        상수의 경우 대문자로 표기하는게 국룰 
        상수 앞에 $를 사용하면 에러
        접근제어자를 쓰지 않으면 public default
        일반 프로퍼티랑 다르게 클래스 생성 없이 바로 접근 가능
        한번 정해진 값은 두번다시 바뀌지 않는다.
        
        static, const $this -> properties가 아닌
        self::properties 사용
    */

    class Base {
        const AGE = 30; 
        public $mustOlderThan = 21;
    }

    // 상수(const)일 경우 생성자 없이 사용 가능
    echo "<p>".Base::AGE."</p>";

    $base = new Base();

    // 일반 프로퍼티의 경우 위에 클래스 생성 후 접근 가능
    echo $base -> mustOlderThan;
