<?php 

    // 파일 읽기 함수
    /*
        readfile() : 파일을 그대로 읽어서 출력
        
        file download 할때 readfile() 함수를 많이 사용
    */

    // 버튼 클릭시 다운로드
    $filepath = "./upload/python.png"; # 파일 위치
    $filesize = filesize($filepath); # 파일 사이즈
    $filename = "sample.png"; # 파일 이름 설정

    // header 설정
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$filename"); # 다운로드 되는 파일의 이름 지정
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: $filesize"); # 파일 사이즈 명시

    ob_clean();
    flush(); # 버퍼 비우기
    readfile($filepath); # 파일 읽어서 다운로드


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER["PHP_SELF"]?>" method="GET">
        <button>다운로드</button>
    </form>
</body>
</html>