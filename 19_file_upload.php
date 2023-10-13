<?php

    // 파일 업로드
    /*
        enctype="multipart/form-data" 추가
        2차원 배열 형식으로 데이터가 넘어 옴

        만약 mac 사용자인 경우 ini 파일에서 file_uploads: On 설정이 되어있어도 안된다면
        해당 업로드 파일의 권한을 터미널에서 수정해줘야한다.
        sudo chmod -R 777 .
        
        ini 파일을 변경했을 경우 서버를 재기동 해야한다.
    */

    print_r($_FILES)."<br>"; # 어떤 형식으로 넘어 오는지 확인
    echo "파일명 : ".$_FILES["file"]["name"]."<br>";
    echo "파일 용량 : ".$_FILES["file"]["size"]."<br>";

    // 업로드 폴더 위치
    $target_file = "./upload/".$_FILES["file"]["name"]; # 파일이 업로드 될 폴더 위치 (파일 이름도 꼭 같이 들어가야 한다.)
    // 업로드 파일 설정
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file); # 파일 위치, 업로드 될 폴더

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>파일 업로드</title>
</head>
<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="file"><br>
        <button>업로드</button>
    </form>
</body>
</html>