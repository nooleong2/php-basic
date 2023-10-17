<?php

    //  cURL = Client URL
    /*
        접속과 통신
        http, https, ftp, sftp, smtp
        api : 문자 발송, 이메일 발송, 카카오 알림톡, 결제 시스템
    */

    $curl = curl_init(); # 사용

    curl_setopt($curl, CURLOPT_URL, "https://www.daum.net"); # url 적용
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);
    curl_close($curl); # 종료

    // echo iconv("euc-kr", "utf-8", $response); # charset을 변경해주는 함수 html 페이지가 utf-8이 아닐 경우 사용
    echo $response;