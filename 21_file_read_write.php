<?php

    // 파일 읽기, 쓰기
    // fopen() : 열기
    // fread() : 읽기

    $file = "sample.txt";

    // 1. 파일이 있는지 확인
    if (file_exists($file)) {
        $pf = fopen("$file", "r"); # 파일 이름, 읽기,쓰기 모드 설정

        // 2. 파일이 제대로 열렸는지 확인
        if ($pf) {
            $fz = filesize($file); #  파일 사이즈
            $fr = fread($pf, $fz);

            // 3. 파일이 제대로 읽었는지 확인
            if ($fr) {
                echo $fr."<br>";
                fclose($pf); # 마지막으로 파일을 닫아줘야한다 메모리 누수 발생을 방지
            } else {
                echo "파일 읽기에 실패했습니다.<br>";
            }

        } else {
            echo "파일 열기에 실패했습니다.<br>";
        }
        
    } else {
        echo "존재하지 않는 파일입니다.<br>";
    }

    // 파일 쓰기
    $file_write = "sample.txt";
    $handle = fopen($file_write, "w"); // w, 쓰기 , a 이어쓰기
    fwrite($handle, "Say, Hi~~".PHP_EOL); // PHP_EOL : 붙여 쓰기보다 개행이 들어갔으면 좋을 때

    fclose($handle);

?>