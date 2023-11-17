<?php

class Todo extends Dbh {
    
    private $title;
    private $content;

    public function __construct($title = null, $content = null) {
        $this->title = $title;
        $this->content = $content;
    }

    private function insertTodo() {
        $sql = "INSERT INTO todo (title, content) VALUES (:title, :content);";
        $stmt = parent::connect()->prepare($sql);
        $data = [
            ":title" => $this->title,
            ":content" => $this->content,
        ];
        $stmt->execute($data);
    }

    private function isEmptyValue() {
        if (isset($this->title) && isset($this->content)) {
            return false;
        } else {
            return true;
        }
    }

    public function addTodo() {
        if ($this->isEmptyValue()) {
            $result = ["result" => "isEmptyValue"];
            die(json_decode($result));
        }

        $this->insertTodo();
    }
    
}