<?php 

include_once '../model/users.php';

class UsersController extends Users{

    public function getUsers(){
        $result = $this->getUsersDB();
        return $result;
    }

    public function setRole(){
        if($_SERVER ['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['setRole'])){
                $id = $_POST['setRole'];
                $result = $this->setRoleDB($id);
                if($result == 1){
                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "Role changed successfully";
                    header('Location: ../admin/users.php');
                    die;
                }
            }
        }
    }

    public function deleteUser(){
        if($_SERVER ['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['DeleteUser'])){
                $id = $_POST['DeleteUser'];
                $result = $this->deleteUserDB($id);
                if($result == 1){
                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "User deleted successfully";
                    header('Location: ../admin/users.php');
                    die;
                }
            }
        }
    }

    public function SearchUser(){
        $search=$_POST['search'];
        $result=$this->SearchUserDB($search); 
        return $result;
    }

    /* ============================== Login ============================== */

    public function loginUser(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_REQUEST['login'])){


                extract($_POST);
                $this->validateLogin($emailSignin,$passwordSignin);

            }
        }
    }

    public function validateLogin($email,$password){

        if(!$this->emptyInputLogin($email, $password)){
            header("location: ../pages/login.php?error=emptyinput");
            exit();
        }elseif(!$this->invalidEmail($email)){
            header("location: ../pages/login.php?error=Erroremail");
            exit();
        }else{
            $this->getUser($email, $password);
            header('location: ../pages/index.php');
        }
    }

    /* ============================== Signup ============================== */

    public function signupUser(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_REQUEST['signup'])){

                extract($_POST);
                $_SESSION["name"] = $nameSignup;
                $_SESSION["email"] = $emailSignup;
                $_SESSION["password"] = $passwordSignup;
                $_SESSION["Rpassword"] = $Repeatpassword;
                $this->validateSignup($nameSignup,$emailSignup,$passwordSignup,$Repeatpassword);

            }
        }
    }

    public function validateSignup($name,$email,$password,$RepeatPassword){

        if(!$this->emptyInputSignup($name, $email, $password, $RepeatPassword)){
            header("location: ../pages/signup.php?error=emptyinput");
            exit();
        }
        elseif(!$this->invalidName($name)){
            header("location: ../pages/signup.php?error=Errorusername");
            exit();
        }
        elseif(!$this->invalidEmail($email)){
            header("location: ../pages/signup.php?error=Erroremail");
            exit();
        }
        elseif(!$this->passwordMatch($password, $RepeatPassword)){
            header("location: ../pages/signup.php?error=Matchpassword");
            exit();
        }
        elseif(!$this->checkEmailSignup($email)){
            header("location: ../pages/signup.php?error=emailtaken");
            exit();
        }else{
            $this->setUser($name,$email,$password);
            header('location: ../pages/login.php');
        }
    }

    /* ============================== Update ============================== */

    public function UpdateUsers(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_REQUEST['update'])){

                extract($_POST);
                $_SESSION["name"] = $nameEdit;
                $_SESSION["email"] = $emailEdit;
                $_SESSION["password"] = $passwordEdit;
                $_SESSION["Rpassword"] = $RpasswordEdit;
                $this->validateUpdate($nameEdit,$emailEdit,$passwordEdit,$RpasswordEdit,$id);

            }
        }
    }

    public function validateUpdate($name,$email,$password,$RepeatPassword,$id){
        if(!$this->emptyInputUpdate($name, $email)){
            header("location: ../pages/profile.php?error=emptyinput");
            exit();
        }
        elseif(!$this->invalidName($name)){
            header("location: ../pages/profile.php?error=Errorusername");
            exit();
        }
        elseif(!$this->invalidEmail($email)){
            header("location: ../pages/profile.php?error=Erroremail");
            exit();
        }
        elseif(!$this->passwordMatch($password, $RepeatPassword)){
            header("location: ../pages/profile.php?error=Matchpassword");
            exit();
        }
        elseif(!$this->checkEmailUpdate($email)){
            header("location: ../pages/profile.php?error=emailtaken");
            exit();
        }else{
            $this->updateUserBD($name,$email,$password,$id);
            header('location: ../pages/profile.php');
        }
    }

    /* ============================== Validation ============================== */

    function emptyInputLogin($email,$password): bool
    {
        if(empty($email) ||empty($password)){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

    function emptyInputSignup($name,$email,$password,$RepeatPassword): bool
    {
        if(empty($name) ||empty($email) ||empty($password) ||empty($RepeatPassword)){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

    function emptyInputUpdate($name,$email): bool
    {
        if(empty($name) ||empty($email)){
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

    function invalidName($name): bool
    {
        if(!preg_match("/^([a-zA-Z0-9]*[ ]{0,1}[a-zA-Z0-9]*)$/",$name )){
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

    function checkEmailSignup($email): bool
    {
        if($this->checkEmailSignupBD($email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    function checkEmailUpdate($email): bool
    {
        if($this->checkEmailUpdateBD($email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

}