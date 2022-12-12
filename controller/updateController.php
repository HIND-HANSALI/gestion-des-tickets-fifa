<?php

include_once(dirname(__DIR__) .'/model/update.php');

class UpdateContr extends Update {

    public function UpdateUsers(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_REQUEST['signup'])){

                extract($_POST);
                $_SESSION["name"] = $nameSignup;
                $_SESSION["email"] = $emailSignup;
                $_SESSION["password"] = $passwordSignup;
                $_SESSION["Rpassword"] = $Repeatpassword;
                $this->Updateuser($nameEdit,$emailEdit,$passwordEdit,$RpasswordEdit);

            }
        }
    }

    public function Updateuser($name,$email,$password,$RepeatPassword){

        if(!$this->emptyInput($name, $email, $password, $RepeatPassword)){
            header("location: ../pages/sign.up.php?error=emptyinput");
            exit();
        }
        elseif(!$this->invalidName($name)){
            header("location: ../pages/sign.up.php?error=Errorusername");
            exit();
        }
        elseif(!$this->invalidEmail($email)){
            header("location: ../pages/sign.up.php?error=Erroremail");
            exit();
        }
        elseif(!$this->passwordMatch($password, $RepeatPassword)){
            header("location: ../pages/sign.up.php?error=Matchpassword");
            exit();
        }
        elseif(!$this->check($email)){
            header("location: ../pages/sign.up.php?error=emailtaken");
            exit();
        }else{
            $this->setUser($name,$email,$password);
            header('location: ../pages/landing_page.php');
        }
    }

    function emptyInput($name,$email,$password,$RepeatPassword): bool
    {
        if(empty($name) ||empty($email) ||empty($password) ||empty($RepeatPassword)){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

    function invalidName($name): bool
    {
        if(!preg_match("/^[a-zA-Z0-9]*$/",$name )){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

    function invalidEmail($email): bool
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

    function passwordMatch($password,$RepeatPassword): bool
    {
        if($password !== $RepeatPassword){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    function check($email): bool
    {
        if($this->checkUser($email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }


}