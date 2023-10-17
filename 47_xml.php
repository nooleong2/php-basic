<?php

    // XML 파일 읽어서 활용하기
    // 지디넷 기사 rss 불러오기
    $xml = file_get_contents("https://feeds.feedburner.com/zdkorea"); # xml 가져 오기

    $dom = simplexml_load_string($xml); # arrow 연산자로 접근 가능한 형태로 변경
    // print_r($dom);

    echo "<h1>".$dom -> channel -> title."</h1>";
    echo "<h2>".$dom -> channel -> description."<h2>";
    $i = 0;
    foreach ($dom -> channel -> item as $row) {
        echo "<a href='".$row -> link."' target='_blank'>".$row -> title."</a>".$row -> pubDate."<br>";
        $i++;
        if ($i == 5) {
            exit;
        }
    }