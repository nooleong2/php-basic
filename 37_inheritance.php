<?php

    // 상속 (inheritence)
    /*
        프로그래밍에서의 상속은 재산과 같은 물질적인 물려받음이라기보다는
        유전형질을 내려 받는 것과 같은 것으로 생각 해야 한다.
        상속을 이용하면 기존 클래스의 변수와 코드를 재사용 할 수 있다.
        
        동물 -> 지상(동물) -> 호랑이, 사슴
            -> 공중(동물) -> 독수리, 기러기
    */

    class Aniaml {

        private $name;
        private $age;

        function __construct($name, $age) {
            $this -> name = $name;
            $this -> age = $age;
        }

        function intro() {
            echo "이 동물의 이름은 {$this -> name} 이고 나이는 {$this -> age}살 입니다.<br>";
        }
    }

    class GroundAnimal extends Aniaml {
        
        function message() {
            echo "저는 지상 동물 입니다.<br>";
        }
    }

    $tiger = new GroundAnimal("호랑이", 10);
    $tiger -> intro(); # 상속받은 클래스의 메소드도 사용할 수 있음
    $tiger -> message();



