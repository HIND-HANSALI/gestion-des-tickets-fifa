<?php 

include_once('../model/stade.php');  // Path to the model

class StadeController extends Stades{

    public function getStades(){
        $result = $this -> getStadesDB();
        return $result;
    }

    public function addStade(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_REQUEST['addStadeForm'])){
                
                extract($_POST);

                $result = $this -> addStadeDB($id, $name, $location, $capacity, $picture);
                
                if($result == 1){

                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "Stades added successfully";

                    header('Location: ../admin/stade.php');
                    die;
                }
            }
        }
    }


    
}