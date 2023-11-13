<?php
/**
 * 클래스 파일의 경우 파일명 첫번째는 대문자로 구분
 * 클래스 생성 시 파일명과 동일하게 지어주자 Java 랑 비슷
 */
class Car {

    /**
     * Properties and Fields
     * public : 어디서든 사용 가능
     * protected : 현재 클래스 파일 and 하위(상속) 받은 클래스에서만 사용 가능
     * private : 해당 클래스 파일에서만 사용 가능
     */
    private $brand;
    private $color;
    public $vehicleType = "car";

    /* Construct 생성자 */
    public function __construct($brand = "null", $color = "none") {

        /* $this : Object 본인 */
        $this->brand = $brand;
        $this->color = $color;
    }
    
    /**
     * Methods
     * Getter && Setter
     */
    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $allowedColors = [
            "red",
            "blue",
            "green",
            "yellow",
        ];

        /* $color의 값이  $allowedColors 배열에 존재하면 true */
        if (in_array($color, $allowedColors)) {
            $this->color = $color;
        }
        
    }

    public function getCarInfo() {
        return "Barnd: " . $this->brand . ", Color: " . $this->color;
    }

}