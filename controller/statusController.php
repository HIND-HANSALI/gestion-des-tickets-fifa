<?php 

include_once('../model/status.php');  // Path to the model

class StatusController extends Status{

    public function getStatus(){
        $result = $this -> getStatusDB();
        return $result;
    }




    
}