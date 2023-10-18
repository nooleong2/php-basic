<?php
    $vote = (isset($_GET["vote"]) && $_GET["vote"] != "") ? $_GET["vote"] : "";

    $filename = "./upload/poll_data.txt";
    if (!file_exists($filename)) { # $filename이 없으면 true
        file_put_contents($filename, "0,0"); # 파일이 없으면 생성
    }

    $content = file_get_contents($filename);
    list($yes, $no) = explode(",", $content); # , <- 기준으로 짜름

    if ($vote == 0) {
        $yes++;
    } else {
        $no++;
    }
    file_put_contents($filename, "{$yes},{$no}"); # 파일이 있으면 계속해서 업데이트

    $yes_width = round(($yes / ($yes + $no)) * 100); # 비율 계산 (소수점 필요없이 반올림 해주기)
    $no_width = round(($no / ($yes + $no)) * 100);

    echo $yes_width.":".$no_width;

?>
<h2>투표 결과 : </h2>
<table>
    <tr>
        <td>예</td>
        
        <td><img src="https://www.w3schools.com/php/poll.gif" height="20" width="<?php echo $yes_width?>"></td>
    </tr>
    <tr>
        <td>아니요</td>
        <td><img src="https://www.w3schools.com/php/poll.gif" height="20" width="<?php echo $no_width?>"></td>
    </tr>
</table>