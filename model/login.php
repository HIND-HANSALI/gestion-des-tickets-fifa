<?php

session_start();

include_once('database.php');  // Path to the DataBase

class Login extends Connection
{

    protected function getUser($email, $password)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location : ../pages/sign.in.php?error=stmtfailed");
            exit();
        }


        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../pages/sign.in.php?error=wronglogin");
            exit();
        }



        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $checkPwd = password_verify($password, $pwdHashed[0]["passworld"]);

        if ($checkPwd == false) {
            $stmt = null;
            echo $_SESSION["email"] = $email;
            echo $_SESSION["password"] = $password;
            echo $_SESSION["name"] = $pwdHashed[0]["fullname"];
            header("location: ../pages/sign.in.php?error=wronglogin");
            exit();
        } elseif ($checkPwd == true) {
            $_SESSION["Username"] = $pwdHashed[0]["fullname"];
            $_SESSION["good"] = "goode";
        }
        $stmt = null;
    }
}