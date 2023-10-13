<style>
    * {line-height: 1; margin: 0;}
    span {color: white; background: red;}
    h3 {color: lightgray;}
</style>
<?php

    // 정규표현식
    /*
        특정한 규칙을 가진 문자열의 집합을 표현하는데 사용하는 형식의 언어
        프로그래밍 언어나 각종 프로금에서 문자열의 검색이나 변경이 필요할 경우 사용

        ex)
        회원 가입시 이메일 입력 형식 체크
        비밀번호 생성시 특정 조건 강제화
        게시물의 URL 문자열에 자동 링크 걸기
        특정 조건 문자열의 자동 치환

     */

    $string = "Hello, world";
    $pattern = "/hello/i"; # 대소문자 구분 안함을 위해 플래그 위치에 i추가

    $cnt = preg_match($pattern, $string, $result); # 패턴, 문자열, 결과값
    echo $cnt."<br>"; # 찾으면 1(true), 없으면 0(false)

    $txt = "who is who";
    $patt = "/^who/"; # ^w로 시작하는 문자열 찾기
    $patt2 = "/ho$/"; # o$로 끝나는 문자열 찾기

    $txt2 = "$12$ \-\ $25$25";
    $patt3 = "/\$$/"; # 특수문자를 찾을경우 백스페이스\를 이용해서 찾을 수 있음

    echo "<h3>before:</h3>";
    echo $txt2;

    echo "<p>&nbsp;</p>";

    echo "<h3>after:</h3>";
    $replacement = "<span>*12</span>";

    echo preg_replace($patt3, $replacement, $txt2); # 패턴, 바꿀 문자열, 대상 문자열

    // any .(글자 수), []
    $str = "Reqular Expressions";
    $str_pattern = "/^R.../"; # R로 시작하고 뒤에 3글자 더 찾음
    $str2 = "OK.OK.";
    $str2_pattern = "/\./"; # 문자열에 있는 모든 .들을 다 찾음

    $str3 = "How do you do?";
    $str3_pattern = "/[oyu]/"; # 대괄호 안 에있는 알파벳별로 문자열에서 다 찾음
    $str4_pattern = "/[oyu][yow]/"; # 문자열에서는 첫번째 대괄호인 oyu를 찾고 두번째 대괄호인 yow가 를 찾아서 두개의 패턴이 일치하면 해당 문자열 찾음

    echo "<h3>before:</h3>";
    echo $str3;

    echo "<p>&nbsp;</p>";

    echo "<h3>after:</h3>";
    $replacement = "<span> </span>";

    echo preg_replace($str3_pattern, $replacement, $str3); # 패턴, 바꿀 문자열, 대상 문자열

    // - (하이푼), [^문자] Not 반대, (|) 서브 패턴
    $str_hypoon = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $str_hypoon_pattern  = "/[a-zA-Z]/"; # - a~z,A~Z 다 찾음
    $str_hypoon2_pattern  = "/[^C0-9]/"; # C랑 0~9 빼고 다 찾음
    $str_hypoon3_pattern  = "/(C|a|0)/"; # C 또는 a 또는 0을 찾아줘

    echo "<h3>before:</h3>";
    echo $str_hypoon;

    echo "<p>&nbsp;</p>";

    echo "<h3>after:</h3>";
    $replacement = "<span>~</span>";

    echo preg_replace($str_hypoon3_pattern, $replacement, $str_hypoon); # 패턴, 바꿀 문자열, 대상 문자열

    /*

        정규 표현식 연습 사이트
        https://regex101.com/

        수량자 (Quantifier)

        * 앞에 있는 문자가 0기 이상 (와일드카드)
        없거나, 있거나, 많거나

        + 앞에 있는 문자가 1개 이상 (필수 조건)
        있거나, 많거나

        ? 앞에 있는 문자가 1개 이하 (필수 조건)
        1개만 있거나, 없거나
        
     */

?>