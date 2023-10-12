<?php
    // 논리 연산자
    // and, or, xor, &&, ||, !

    $x = true;
    $y = true;

    var_dump($x and $y); # 양쪽이 true 면 true 아니면 false
    var_dump($x && $y); # 위에랑 동일

    $xx = true;
    $yy = false;

    var_dump($xx or $yy); # 양쪽에서 하나만 true면 true, 둘다 false면 false
    var_dump($xx || $yy); # 위에랑 동일

    $xxx = true;
    $yyy = false;
    var_dump($xxx xor $yyy); # 두 값이 다르면 true 아니면 false

    var_dump(!$x); // ! == 반대 true => false
    var_dump(!$yy); // ! == 반대 false => true

?>