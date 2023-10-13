<?php

    // 디렉토리 파일 풀러오기 dir()

    $dir_name = "./upload";
    $d = dir($dir_name); # 인스턴스 만들어 준다.
    $filename = $d -> read(); # 파일 하나만 들고 옴
    echo $filename."<br>";

    $filename = $d -> read(); # .. (부모 폴더)
    echo $filename."<br>";

    $filename = $d -> read(); # 파일 불러 옴
    echo $filename."<br>";

    // 파일이 많을 경우 반복문 이용
    while (($filename = $d -> read()) !== false) {

        if ($filename == "." || $filename == "..") {
            continue;
        }   

        echo "<img src='.//upload/{$filename}'><br>";
    }

    $d->close(); # 메모리 누수를 위한 닫기


?>