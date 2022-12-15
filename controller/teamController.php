<?php 

include_once('../model/teams.php');  // Path to the model

class TeamController extends Teams{

    public function getTeams(){
        $result = $this -> getTeamsDB();
        return $result;
    }

    
    public function getOneTeam(){
        if(isset($_GET['id'])){
            $result = $this->getOneTeamDB($_GET['id']);
            return $result;
        }
    }


    public function addTeam(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['addTeamForm'])){
                extract($_POST);
                $picture= $this->uploadimage();
                if($picture =="null"){
                    $_SESSION['icon'] = "error";
                    $_SESSION['message'] = "Veuillez selectioner une image";
                    header('Location: ../admin/teams.php');
                    die;
                }else{
                    $result=$this->addTeamDB($nationality, $groupe,$picture);
                    if($result == 1){
                        
                        $_SESSION['icon'] = "success";
                        $_SESSION['message'] = "Team added successfully";

                        header('Location: ../admin/teams.php');
                        die;
                    }
                }
            }
        }
    }


    public function updateTeam(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['updateTeamForm'])){
                extract($_POST);
                $picture=$this->uploadimage();
                if(empty($nationality)||empty($groupe)){
                    $_SESSION['icon'] = 'error' ;
                    $_SESSION['message'] = 'Veuillez remplir tous les champs';
                    header('Location: ../admin/teams.php');
                    die;
                }
                else{
                    if($picture != "null"){ 
                        $result = $this->updateTeamDB($nationality,$groupe,$picture,$id);
                        if ($result == 1) {

                            $_SESSION['icon'] = "success";
                            $_SESSION['message'] = "Team modifie avec succès";
                            header('Location:' . $_SERVER['PHP_SELF']);
                            die;
                        }
                     }else {
                        $result = $this->LastPicUpdateDB($id, $nationality, $groupe);
                        if ($result == 1) {

                            $_SESSION['icon'] = "success";
                            $_SESSION['message'] = "Team modifie avec succès";
                            header('Location:' . $_SERVER['PHP_SELF']);
                            die;
                        }
                     }
                }
            }
        }
    }


    public function deleteTeam(){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_REQUEST['DeleteTeam'])){
                $id = $_REQUEST['DeleteTeam'];
                $result = $this -> deleteTeamDB($id);
                if($result == 1){
                    die;
                }
            }
        }
    }


    public function searchTeam(){
        $search=$_POST['search'];
        $result=$this->searchTeamDB($search); 
        return $result ;

    }


    function uploadimage()
    {
    if (isset($_FILES["my_image"]["name"])) 
        {

            $img_name = $_FILES['my_image']['name'];
            $img_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];// temporer folder
            $error = $_FILES['my_image']['error'];
            if(!empty($_FILES['my_image']['name'])){

                if ($error === 0)
                {
                
                    if ($img_size > 3000000) 
                    {
                        $_SESSION['icon'] = "error";
                        $_SESSION['message'] = "Sorry, your file is too large.";
                         header('location: ../admin/teams.php');
                        die;
                    }else{
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);// return extension of image
                        $img_ex_lc = strtolower($img_ex);

                        $allowed_exs = array("jpg", "jpeg", "png","jfif"); 

                        if (in_array($img_ex_lc, $allowed_exs)) 
                        {
                            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                            $img_upload_path = '../assets/img/uploads/'.$new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);//temporer vers  folder


                        }
                        else {
                            $_SESSION['icon'] = "error";
                            $_SESSION['message'] = "You can't upload files of this type";
                            header('location: ../admin/teams.php');
                            die;
                        }
                    }
                }else{
                    $_SESSION['icon'] = "error";
                    $_SESSION['message'] = 'unknown error occurred!';
                    header('location: ../admin/teams.php');
                    die;
                }
            }else {
                $img_upload_path = "null";
            }

        }
    
        return $img_upload_path;
    } 
    

    public function FourTeams(){
        $result = $this -> getFourTeamsDB();
        return $result;
    }


    
}