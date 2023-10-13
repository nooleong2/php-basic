<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이미지 갤러리</title>
</head>
<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="ufile">
        <button>업로드</button>
    </form>
</body>
</html>
<?php
    // 간단한 파일 업로드 || 파일 갤러리 만들어 보기
    /*
        디자인 X
        DATABASE X
        페이징 X
        썸네일 X

        이 때 까지 배운걸로 만들어 보기
    */

    function get_file_type($file_name) {       
        $arr = explode(".", $file_name);
        return end($arr);
    }

    function is_type_check($type) {
        switch ($type) {
            case "png":
                return true;
                break;
            case "jpg":
                return true;
                break;
            case "jpeg":
                return true;
                break;
            default:
                return false;
                break;
        }
    }
    
    $file_name = $_FILES["ufile"]["name"];
    $tmp_name = $_FILES["ufile"]["tmp_name"];

    // png, jpg, jpeg 만 등록 가능하게
    // 1. 파일 타입 추출
    $file_type = get_file_type($file_name);

    // 2. 파일 타입 체크
    if (is_type_check($file_type)) {

        // 업로드 폴더 위치
        $target_file = "./gallery/".$file_name;
        // 업로드 파일 설정
        move_uploaded_file($tmp_name, $target_file);
        echo "성공<br><br><br>"

    } else {
        echo "실패<br><br><br>";
    }

    // 파일 보여주기
    $dir_name = "./gallery";
    $d = dir($dir_name); # 폴더 인스턴스 생성

    // 파일이 얼마나 있는지 모르기 때문에 while 문
    while(($img_file = $d -> read()) !== false) {

        if ($img_file == "." || $img_file == "..") {
            continue;
        }

        echo "<img src='./gallery/{$img_file}'><br><br><br>";
    }

?>