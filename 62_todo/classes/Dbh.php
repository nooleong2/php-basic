<?php

class Dbh {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "example";

    protected function connect() {
        try {
            $pdo = new PDO("mysql:host=" . $this->servername . "; dbname=" . $this->dbname, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}