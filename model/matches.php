<?php
include_once('database.php');  // Path to the DataBase

class Matches extends Connection {
    
    protected function getMatchesDB(){

        $sql = "SELECT m.id_match AS id_match , m.id_team1, m.id_team2, m.id_stade, m.capacity, st.name AS status, 
            m.time, m.picture, m.description, m.price, t1.nationality AS team1, t2.nationality AS team2, sd.name AS stade
            FROM matches m 
            INNER JOIN teams t1 ON m.id_team1 = t1.id_team 
            INNER JOIN teams t2 ON m.id_team2 = t2.id_team 
            INNER JOIN stades sd ON m.id_stade = sd.id_stade 
            INNER JOIN status st ON m.id_status = st.id_status";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function FourMatchesDB(){

        $sql = "SELECT m.id_match, m.id_team1, m.id_team2, m.id_stade, m.capacity, st.name AS status, m.time, m.picture, m.description, m.price, t1.nationality AS team1, t2.nationality AS team2, sd.name AS stade
            FROM matches m INNER JOIN teams t1 ON m.id_team1 = t1.id_team INNER JOIN teams t2 ON m.id_team2 = t2.id_team INNER JOIN stades sd ON m.id_stade = sd.id_stade INNER JOIN status st ON m.id_status = st.id_status ORDER BY m.id_match DESC LIMIT 4";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function getMatchDB($id){

        $sql = "SELECT * FROM matches WHERE id_match = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    protected function addMatchDB($idTeam1, $idTeam2, $idStade, $idStatus, $price, $time, $picture, $description){

        $sql = "SELECT capacity FROM stades WHERE id_stade = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$idStade]);
        $capacity = $stmt->fetchColumn();

        $sql = "INSERT INTO matches (id_team1, id_team2, id_stade, id_status, price, time, capacity, picture, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$idTeam1, $idTeam2, $idStade, $idStatus, $price, $time, $capacity, $picture, $description]);
        return 1;
    }

    protected function updateMatchDB($id, $idTeam1, $idTeam2, $idStade, $idStatus, $price, $capacity, $time, $picture, $description){

        $sql = "SELECT * FROM matches WHERE id_match = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt -> execute([$id]);
        $result = $stmt ->fetch();
        if($result['picture'] != ''){
            $pic = $result['picture'];
            unlink($pic);
        }

        $sql = "UPDATE matches SET id_team1 = ?, id_team2 = ?, id_stade = ?, id_status = ?, price = ?, time = ?, capacity =? , picture = ?, description = ? WHERE id_match = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$idTeam1, $idTeam2, $idStade, $idStatus, $price, $time, $capacity, $picture, $description, $id]);
        return 1;
    }
    
    
    protected function lastPicUpdateDB($id, $idTeam1, $idTeam2, $idStade, $idStatus, $capacity, $price, $time, $description){

        $sql = "UPDATE matches SET id_team1 = ?, id_team2 = ?, id_stade = ?, id_status = ?, price = ?, capacity = ?, time = ?, description = ? WHERE id_match = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$idTeam1, $idTeam2, $idStade, $idStatus, $price, $capacity, $time, $description, $id]);
        return 1;
    }



    protected function deleteMatchDB($id){
    
        $sql = "SELECT * FROM matches WHERE id_match = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt -> execute([$id]);
        $result = $stmt ->fetch();
        if($result['picture'] != ''){
            $picture = $result['picture'];
            unlink($picture);
        }

        $sql = "DELETE FROM matches WHERE id_match = ?";
        $stmt = $this->connect() -> prepare($sql);
        $stmt->execute([$id]);


        return 1;
    }

    function searchMatchDB($search){

        $sql = "SELECT m.id_match AS id_match , m.id_team1, m.id_team2, m.id_stade, m.capacity, st.name AS status, m.time, 
            m.picture, m.description, m.price, t1.nationality AS team1, t2.nationality AS team2, sd.name AS stade
            FROM matches m 
            INNER JOIN teams t1 ON m.id_team1 = t1.id_team 
            INNER JOIN teams t2 ON m.id_team2 = t2.id_team 
            INNER JOIN stades sd ON m.id_stade = sd.id_stade 
            INNER JOIN status st ON m.id_status = st.id_status 
            WHERE t1.nationality  like '%$search%' 
            OR t2.nationality like '%$search%'
            OR sd.name like '%$search%'
            OR st.name like '%$search%'";

        $result = $this->connect()->prepare($sql);
        $result->execute();
        $match = $result->fetchAll();
        
        return $match;
     } 




}
