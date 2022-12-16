<?php 
include_once('../model/statistics.php');  // Path to the model

class StatisticsController extends Statistics{

public function countMatches(){
        $result = $this -> countMatchesDB();
        return $result;
    }
public function countTeams(){
        $result = $this -> countTeamsDB();
        return $result;
    }
public function countStades(){
        $result = $this -> countStadesDB();
        return $result;
    }
public function countSpectateurs(){
    $result = $this -> countSpectateursDB();
        return $result;
}  
public function countTickets(){
    $result = $this -> countTicketsDB();
        return $result;
} 
public function sommeTickets(){
    $result = $this -> sommeTicketsDB();
        return $result;
}


}





?>