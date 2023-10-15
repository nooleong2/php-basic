<?php

    class Fruit {
        private $name;
        private $color;

        // constructor (생성자)
        /*
            객체가 생성될 때 꼭 필요한 값을 편리하게 작성 가능하게 만들어 줌
            생성자가 존재할 때 인스턴스 생성 할때 바로 값을 넣을 수 있음
            set 메소드가 필요 없어짐
        */
        function __construct($name, $color) {
            $this -> name = $name;
            $this -> color = $color;
        }

        function get_name() {
            return $this -> name;
        }

        function get_color() {
            return $this -> color;
        }

        function show_info() {
            echo "name : {$this -> name}, color : {$this -> color}<br>";
        }

    }

    $apple = new Fruit("apple", "red");
    $apple -> show_info();

    $banana = new Fruit("바나나", "노랑");
    $banana -> show_info();