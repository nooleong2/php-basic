<?php

    // OOP 클래스 생성
    class Fruit {
        // Properties
        /*
            public 일 경우 $object -> name 바로 접근 가능 하지만
            private 일 경우 바로 접근이 불가능 하고 메소드를 통해서만 접근 가능
        */
        private $name;
        private $color;

        // Methods
        function get_name() {
            return $this -> name;
        }

        function get_color() {
            return $this -> color;
        }

        function set_name($name) {
            $this -> name = $name;
        }

        function set_color($color) {
            $this -> color = $color;
        }

        function show_info() {
            echo "name: {$this -> name}. color: {$this -> color}<br>";
        }
    }

    $apple = new Fruit();
    $apple -> set_name("사과");
    $apple -> set_color("빨강");
    $apple -> show_info();

    $banana = new Fruit();
    $banana -> set_name("바나나");
    $banana -> set_color("노랑");
    $banana -> show_info();

    

?>