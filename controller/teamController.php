<?php 

include_once('../model/teams.php');  // Path to the model

class TeamController extends Teams{

    public function getTeams(){
        $result = $this -> getTeamsDB();
        return $result;
    }




    
}