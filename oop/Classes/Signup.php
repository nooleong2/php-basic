<?php
class Signup extends Dbh {

    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    private function insertUser() {
        $query = "INSERT INTO users (username, password) VALUES (:username, :password);";
        $stmt = parent::connect()->prepare($query); // 상위 클래스에 접근하는방법 parent::method()
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->execute();
    }

    private function isEmptySubmit() {
        if (isset($this->username) && isset($this->password)) {
            return false;
        } else {
            return true;
        }
    }

    public function signupUser() {
        // error handles
        if ($this->isEmptySubmit()) {
            header("Location: " . $_SERVER["DOCUMENT_ROOT"] . "/signup_index.php");
            die();
        }

        // If no errors, signup user
        $this->insertUser();

    }
}