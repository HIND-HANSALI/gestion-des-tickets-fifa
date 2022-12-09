<?php 

include_once('../model/stade.php');  // Path to the model

class StadeController extends Stades{

    public function getStades(){
        $result = $this -> getStadesDB();
        return $result;
    }

    public function getOneStade(){
        if(isset($_GET['idEdit'])){
            $data = $this->getOneStadeDB($_GET['idEdit']);
            return $data;
        }
    }

    function uploadimage()
    {
     if (isset($_FILES["picture"]["name"])) //name de image 
    {

        $img_name = $_FILES['picture']['name'];
        $img_size = $_FILES['picture']['size'];
        $tmp_name = $_FILES['picture']['tmp_name'];// temporer folder
        $error = $_FILES['picture']['error'];

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
                            $img_upload_path =  dirname(__DIR__).'/assets/img/uploads/'.$new_img_name;
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

    public function addStade(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_REQUEST['addstadeForm'])){
                
                extract($_POST);
                $filename =$this-> uploadimage();
                $result = $this -> addStadeDB($name, $location, $capacity, $filename);
                
                if($result == 1){

                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "Stade ajouté avec succès";

                    header('Location:'. $_SERVER['PHP_SELF']);
                    die;
                }
            }
        }
    }


    
}