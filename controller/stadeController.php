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


    function uploadimage(){
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
                        $_SESSION['icon'] = "error";
                        $_SESSION['message'] = "Sorry, your file is too large.";
                         header('location: ../admin/stades.php');
                        die;
                    }else{
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
                            $_SESSION['icon'] = "error";
                            $_SESSION['message'] = "You can't upload files of this type";
                            header('location: ../admin/stades.php');
                            die;
                        }
                    }
                }else{
                    $_SESSION['icon'] = "error";
                    $_SESSION['message'] = 'unknown error occurred!';
                    header('location: ../admin/stades.php');
                    die;
                    
                }
            }
    
        return $new_img_name;
    } 

    public function addStade(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_REQUEST['addstadeForm'])){
                
                extract($_POST);

                if( empty($name) || empty($location) || empty($capacity)){
                    $_SESSION['icon'] = "error";
                    $_SESSION['message'] = "Veuillez remplir tous les champs";
                    header('Location: ../admin/stades.php');
                    die;
                }
                else{
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


    public function deleteStade(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_REQUEST['DeleteStade'])){
                $id = $_REQUEST['DeleteStade'];
                $result = $this -> deleteStadeDB($id);
                if($result == 1){
                    die;
                }
            }
        }
    }


    public function FourStades(){
        $result = $this -> getFourStadesDB();
        return $result;
    }

    public function updateStade()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST['updatestadeForm'])) {
                extract($_POST);
                if (empty($id) ||empty($name) || empty($location) || empty($capacity)) {
                    $_SESSION['icon'] = "error";
                    $_SESSION['message'] = "Veuillez remplir tous les champs";
                    header('Location: ../admin/stades.php'); 
                    die;
                } else {
                    $filename = $this->uploadimage();
                    $result = $this->updateStadeDB($name, $location, $capacity, $filename,$id);

                    if ($result == 1) {

                        $_SESSION['icon'] = "success";
                        $_SESSION['message'] = "Stade ajouté avec succès";

                        header('Location:' . $_SERVER['PHP_SELF']);
                        die;
                    }
                }
            }
        }



    }
}