<?php
class Dbh
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "jint_technologies";

    protected function connect()
    {
        try {  
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
            $pdo = new PDO($dsn, $this->username, $this->password);
            return $pdo;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage(). "<br/>";
            die();
        }
    }
}
