<?php

/**
 * 단방향 암호화 함수
 * 
 * 복호화가 되지 않는 방식
 * ex) A -> B 로 변환했을 때 다시 B -> A로 복호화가 되지않는다
 * 비밀번호의 경우 단방향 암호화 함수를 이용해서 사용 해야지 개인정보 유출을 방지 할 수 있다.
 * 
 */

 
 $encPasswd = password_hash("1234aabbcc", PASSWORD_BCRYPT); # 비밀번호, 복호화 옵션 (DEFAULT, BCRYPT)

 $correct_passwd = "1234aabbcc";
 $wrong_passwd = "1111";

 # 입력받은 비밀번호, 복호화되 있는 비밀번호 체크
 if (password_verify($correct_passwd, $encPasswd)) {
    echo "비밀번호 일치";
 } else {
    echo "비밀번호 불일치";
 }
 