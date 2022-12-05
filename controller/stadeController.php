<?php 

include_once('../model/stade.php');  // Path to the model

class StadeController extends Stades{

    public function getStades(){
        $result = $this -> getStadesDB();
        return $result;
    }



    
}