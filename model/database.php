<?php
    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv -> load();
    $serv = $_ENV['DB_SERVERNAME'];
    $user = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_USERPASSWORD'];
    $DB = $_ENV['DB_DATABASE'];

class Connection{

    //CONNECT TO MYSQL DATABASE USING PDO
    private function pdoConnection(){
        $con = new PDO('mysql:host=' . $this->serv . ';dbname=' . $this->DB, $this->user, $this->password);
        try {
            return $con;
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    }

    public function connect(){
        return $this->pdoConnection();
    }
}