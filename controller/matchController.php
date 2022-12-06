<?php
include_once('../model/matches.php');  // Path to the matches

class MatchController extends Matches{

    public function getMatches(){
        $result = $this -> getMatchesDB();
        return $result;
    }

    public function addMatch(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_REQUEST['addMatchForm'])){
                
                extract($_POST);

                $result = $this -> addMatchDB($idTeam1, $idTeam2, $idStade, $idStatus, $price, $time, $picture, $description);
                
                if($result == 1){

                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "Match added successfully";

                    header('Location: ../admin/matches.php');
                    die;
                }
            }
        }
    }




}