<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    require_once "./Classes/Car.php";

    $car01 = new Car();
    $car01->setBrand("Volvo");
    $car01->setColor("Black"); // Black은 $allowedColors 배열 색상에 존재하지 않기 때문에 생성자에서 none으로 설정되어있기 때문에 none으로 표기
    echo $car01->getCarInfo();
    ?>

</body>
</html>