<?php 
// require_once( dirname(__DIR__).'/pages/matches.php');
include_once('database.php');  // Path to the DataBase

class reserve extends Connection{
    protected function getinformationMatch($id_m_stade,$id_m_teamone,$id_m_teamtwo,$id_m_match){

        $sql = "SELECT m.id_match as idMatch , t.nationality as TeamONE ,t2.nationality as TeamTwo,m.time as TimeofMatch,s.name as nameofStade ,s.id_stade as idStade,s.capacity as CapacityofStade ,m.capacity as CapacityofMatch ,m.price as PriceofMatch FROM (((( matches m INNER JOIN stades s ON s.id_stade = ? )INNER JOIN teams t ON t.id_team = ? )INNER JOIN teams t2 ON t2.id_team = ?)INNER JOIN matches ON m.id_match = ?) LIMIT 1";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute([$id_m_stade,$id_m_teamone,$id_m_teamtwo,$id_m_match]);
        $result = $stmt->fetch();
        return $result;
    }
    //	id_ticket	id_match	id_user	price
    protected function addreservationDB($id_match, $id_user, $price){
        $sql = "INSERT INTO tickets (id_match, id_user, price) VALUES (?, ?, ?)";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$id_match, $id_user, $price]);
        return 1;
    }
    
}
