<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    /**
     * error_reporting() 함수 사용 E_ALL 전체 에러를 레포팅
     * ini_set() 함수를 통해 php.ini 파일 수정
     * 0: 웹 브라우저 표시 false
     * 1: 웹 브라우저 표시 true
     */
    error_reporting(E_ALL);
    ini_set("display_errors", 0);

    function customErrorHandler($errno, $errstr, $errfile, $errline) {
        $message = "Error: [$errno] $errstr - $errfile:$errline";
        error_log($message . date(" Y-m-d H:i:m", time()) . PHP_EOL, 3, "./error_log.txt"); // 에러 로그, 3(파일에 저장), 로그 찍을 파일
    }

    set_error_handler("customErrorHandler");

    echo $undefinedVariable;
    ?>

</body>
</html>