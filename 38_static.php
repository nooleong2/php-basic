<?php
    
    // 정적 Method, 정적 Properties Static
    /*
        사용 방법 self::$properties
        객체별로 사용하는것이 아니라 공용으로 다 같이 사용 할 때 사용
    */

    class Car {
        private static $count = 0;
        private static $car_list = [];
        private $name;

        function __construct($name) {
            $this -> name = $name;
            self::$count = self::$count + 1;
            // static properties array에 추가
            array_push(self::$car_list, $name);
        }

        function message() {
            echo "<p>{$this -> name}가 생성되었습니다.</p>";
            echo "<p>생산 번호 : ".self::$count."번</p>";            
        }

        // static method 앞에 static 붙여 줌
        static function get_car_list() {
            return self::$car_list;
        }

    }

    $p1 = new Car("Volvo");
    $p1 -> message();

    $p2 = new Car("Audi");
    $p2 -> message();

    // implode 로 static 함수 사용 구분자를 통해서 합쳐 짐
    $a = implode(",", Car::get_car_list());
    echo "<p>".$a."</p>";