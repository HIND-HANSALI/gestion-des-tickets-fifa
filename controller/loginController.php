<?php

include_once(dirname(__DIR__) .'/model/login.php');

class LoginContr extends Login{

    public function checkUser(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_REQUEST['login'])){


                extract($_POST);
                $this->LoginUser($emailSignin,$passwordSignin);

            }
        }
    }

    public function LoginUser($email,$password){

        if(!$this->emptyInput($email, $password)){
            header("location: ../pages/sign.in.php?error=emptyinput");
            exit();
        }elseif(!$this->invalidEmail($email)){
            header("location: ../pages/sign.in.php?error=Erroremail");
            exit();
        }else{
            $this->getUser($email, $password);
            header('location: ../pages/landing_page.php');
        }
    }

    function emptyInput($email,$password): bool
    {
        if(empty($email) ||empty($password)){
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

}