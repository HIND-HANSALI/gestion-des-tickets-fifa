<?php 

include_once('../model/teams.php');  // Path to the model

class TeamController extends Teams{

    public function getTeams(){
        $result = $this -> getTeamsDB();
        return $result;
    }

    
    public function getOneTeam(){
        if(isset($_GET['id'])){
            // $equipe=new Equipe();
            $result = $this->getOneTeamDB($_GET['id']);
            return $result;
            // if($result){
                
            //     $nom=$result['name'];
            //     $nationality=$result['nationality'];
            //     $groupe=$result['groupe'];
            //     $image=$result['image'];
        
            // }else{
            //     // redirecting to the team page
            //     header('Location: equipetab.php');
            // }
        
        
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
                /* header('Location: ../admin/teams.php');
                    die; */
                if($result == 1){

                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "Team added successfully";

                    header('Location: ../admin/teams.php');
                    die;
                }

            }
        }
    }


    public function updateTeam(){
       
            if(isset($_POST['updateTeamForm'])){
                $picture=$this->uploadimage();
                extract($_POST);
                $result=$this->updateTeamDB($nationality, $groupe,$picture,$id);
                header('Location: ../admin/teams.php');
                die;
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
            // print_r($search);die;
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
                    $_SESSION['Error'] = "Sorry, your file is too large.";
                    //  header('location: .././pages/home.php');
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
                            $_SESSION['Error'] = "You can't upload files of this type";
                            // header('location: .././pages/home.php'); 
                        }
                }
                }
            else
            {

                $_SESSION['Error'] = 'unknown error occurred!';
                // header('location: .././pages/home.php'); 
                
            }
    }
    
    return $new_img_name;
} 
    

    public function FourTeams(){
        $result = $this -> getFourTeamsDB();
        return $result;
    }


    
}