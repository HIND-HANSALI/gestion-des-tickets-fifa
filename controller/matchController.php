<?php
include_once('database.php');  // Path to the DataBase

class MatchController extends Matches{

    public function getMatches(){
        $result = $this -> getMatchesDB();
        return $result;
    }

    public function addMatch(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            extract($_POST);
            $result = $this -> addMatchDB($idTeam1, $idTeam2, $idStade, $time, $picture, $description);
            if($result == 1){
                header('Location: ../view/matches.php');
            }
        }
    }

}