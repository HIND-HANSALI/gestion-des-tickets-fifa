<?php

include_once('database.php');  // Path to the DataBase

class Users extends Connection{


    protected function getUsersDB(){
        $sql = "SELECT * FROM users";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function setRoleDB($id){

        $sql = "SELECT * FROM users WHERE id_user = ?";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        if($result['id_role'] == 2){
            $role = 1;
        }
        if($result['id_role'] == 1){
            $role = 2;
        }

        $sql = "UPDATE users SET id_role = ? WHERE id_user = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$role, $id]);
        return 1;
    }

    protected function deleteUserDB($id){
        $sql = "DELETE FROM users WHERE id_user = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$id]);
        return 1;
    }

    /* ============================== Login ============================== */

    protected function getUser($email, $password)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location : ../pages/login.php?error=stmtfailed");
            exit();
        }


        if ($stmt->rowCount() == 0) {
            $stmt = null;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            header("location: ../pages/login.php?error=wronglogin");
            exit();
        }



        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $checkPwd = password_verify($password, $pwdHashed[0]["passworld"]);

        if ($checkPwd == false) {
            $stmt = null;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            header("location: ../pages/login.php?error=wronglogin");
            exit();
        } elseif ($checkPwd == true) {
            $_SESSION["name"] = $pwdHashed[0]["fullname"];
            $_SESSION["id"] = $pwdHashed[0]["id_user"];
            $_SESSION["role"] = $pwdHashed[0]["id_role"];
            $_SESSION["email"] = $email;
            $_SESSION["good"] = "goode";
        }
        $stmt = null;
    }

    /* ============================== Signup ============================== */

    protected function setUser($name, $email, $password){

        $stmt = $this->connect()->prepare('INSERT INTO users(fullname,email,passworld) value (?, ?, ?);');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt -> execute(array($name, $email, $hashedPwd))){
            $stmt = null;
            header("location : ../pages/signup.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkEmailSignupBD($email){
        $stmt = $this->connect()->prepare('SELECT email FROM users Where email = ?;');


        if(!$stmt -> execute(array($email))){
            $stmt = null;
            header("location : ../pages/signup.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0){
            $resultCheck = true;
        }else{
            $resultCheck = false;
        }

        return $resultCheck;
    }

    /* ============================== Update ============================== */
    protected function updateUserBD($name, $email, $password,$id){

        $stmt = $this->connect()->prepare("UPDATE users SET fullname =?,email =?,passworld =? WHERE id_user='$id';");

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt -> execute(array($name, $email, $hashedPwd))){
            $stmt = null;
            header("location : ../pages/profile.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkEmailUpdateBD($email){
        $stmt = $this->connect()->prepare('SELECT email FROM users Where email = ?;');


        if(!$stmt -> execute(array($email))){
            $stmt = null;
            header("location : ../pages/profile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($data[0]["email"] == $email){
                $resultCheck = false;
            }else{
                $resultCheck = true;
            }
        }else{
            $resultCheck = false;
        }

        return $resultCheck;
    }
}