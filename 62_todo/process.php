<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /**
     * php://input 은 raw POST data를 받을때 사용합니다.$_POST는 헤더에 포함된 POST data를 파싱한 결과를 가지지만,
     * file_get_contents( 'php://input' );하면 파싱하기전 POST data을 가져옵니다.
     */
    $data = json_decode(file_get_contents('php://input'), true);

    $title = $data["title"];
    $content = $data["content"];

    require_once "./classes/Dbh.php";
    require_once "./classes/Todo.php";

    $todo = new Todo($title, $content);
    $todo->addTodo();
}



