<?php

    // 접근제어자 public, protected, private
    /*
        public : 언제 어디서든지 접근 가능
        protected : 외부에서 접근은 불가, 내부에서 접근은 가능 (상속받은 클래스에서도 사용 가능)
        private : 파생된 클래스에서도 접근 금지, 외부에서도 접근 금지, 오로지 자체 클래스에서만 접근 가능
    */

    class Fruit {

        public $name;
        public $color;
        public $weight;

        // public 생략 가능
        function set_name($name) {
            $this -> name = $name;
        }

        protected function set_color($color) {
            $this -> color = $color;
        }

        private function set_weight($weight) {
            $this -> weight = $weight;
        }

        
    }

    $mango = new Fruit();
    $mango -> set_name("망고");
    // $mango -> set_color("Yellow"); # error
    // $mango -> set_wieght(300); # error