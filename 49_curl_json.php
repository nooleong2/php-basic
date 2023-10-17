<?php

    // cURL을 이용한 JSON 데이터 가져오기 / 활용하기
    echo "<p>날씨 출력</p>";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://echo.jsontest.com/temerature/-9.3/humidity/0.40/wind/3"); # JSON 생성 테스트 사이트
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);
    curl_close($curl);

    $arr = json_decode($response); # JSON 데이터 Object로 디코딩
    // print_r($arr);

    // 반복문을 통해 데이터 사용
    foreach ($arr as $key => $var) {
        echo $key.":".$var;
        echo "<br>";
    }
?>

<table border='1'>
    <tr>
        <td>온도<td>
        <td><?= $arr->temerature; ?></td>
    </tr>
    <tr>
        <td>습도<td>
        <td><?= $arr->humidity; ?></td>
    </tr>
    <tr>
        <td>풍속<td>
        <td><?= $arr->wind; ?></td>
    </tr>
</table>
    