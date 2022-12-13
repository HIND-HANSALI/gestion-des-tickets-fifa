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
                // $picture=$_FILES["my_image"]["name"];
                // print_r($_POST);
                // print_r($picture);
                $result=$this->addTeamDB($nationality, $groupe,$picture);
                if($result == 1){

                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "Team added successfully";

                    header('Location: ../admin/allteams.php');
                    die;
                }

            }
        }
    }


    public function updateTeam(){
       
            if(isset($_POST['updateTeamForm'])){
                extract($_POST);
                if(empty($nationality)||empty($groupe)){
                    $_SESSION['icon'] = 'error' ;
                    $_SESSION['message'] = 'Veuillez remplir tous les champs';
                    header('Location: ../admin/allteams.php');
                    die;

                }else{
                    $picture=$this->uploadimage();
                    $result=$this->updateTeamDB($nationality, $groupe,$picture,$id);
                    if($result =1){
                        $_SESSION['icon'] = 'success' ;
                        $_SESSION['message'] = 'teame Update avec succes';
                        header('Location: ../admin/allteams.php');
                        die;
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
     if (isset($_FILES['my_image'])) //name de image 
    {
    
        global $conn;

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];// temporer folder
        $error = $_FILES['my_image']['error'];

            if ($error === 0)
            {
             
                if ($img_size > 3000000) 
                {
                    $_SESSION['icon'] = 'error' ;
                    $_SESSION['message'] = 'Sorry, your file is too large.';
                    header('Location: ../admin/allteams.php');
                }
                else
                {
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
                            $_SESSION['icon'] = 'error' ;
                            $_SESSION['message'] = "You can't upload files of this type";
                            header('Location: ../admin/allteams.php');
                        }
                }
                }
            else
            {
                $_SESSION['icon'] = 'error' ;
                $_SESSION['message'] = 'unknown error occurred!';
                header('Location: ../admin/allteams.php');
                
            }
    }
    
    return $new_img_name;
} 
    

    public function FourTeams(){
        $result = $this -> getFourTeamsDB();
        return $result;
    }


    
}