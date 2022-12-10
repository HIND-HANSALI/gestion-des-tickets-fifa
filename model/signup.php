<?php

session_start();

include_once('database.php');  // Path to the DataBase

class Signup extends Connection{

    protected function setUser($name, $email, $password){

        $stmt = $this->connect()->prepare('INSERT INTO users(fullname,email,passworld) value (?, ?, ?);');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt -> execute(array($name, $email, $hashedPwd))){
            $stmt = null;
            header("location : ../pages/sign.up.php?error=stmtfailed");
            exit();
        }
        $_SESSION["Username"] = $name;
        $_SESSION["good"] = "goode";
        $stmt = null;
    }

    protected function checkUser($email){
        $stmt = $this->connect()->prepare('SELECT email FROM users Where email = ?;');


        if(!$stmt -> execute(array($email))){
            $stmt = null;
            header("location : ../pages/sign.up.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0){
            $resultCheck = true;
        }else{
            $resultCheck = false;
        }

        return $resultCheck;
    }
}