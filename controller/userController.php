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

}