<?php
include_once('database.php');  // Path to the DataBase

class Matches extends Connection {
    
    protected function getMatchesDB(){

        $sql = "SELECT m.id_team1, m.id_team2, m.id_stade, st.name AS status, m.time, m.picture, m.description, m.price, t1.nationality AS team1, t2.nationality AS team2, sd.name AS stade
            FROM matches m INNER JOIN teams t1 ON m.id_team1 = t1.id_team INNER JOIN teams t2 ON m.id_team2 = t2.id_team INNER JOIN stades sd ON m.id_stade = sd.id_stade INNER JOIN status st ON m.id_status = st.id_status";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function getMatchDB($id){

        $sql = "SELECT * FROM matches WHERE id_match = ?";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    protected function addMatchDB($idTeam1, $idTeam2, $idStade, $time, $picture, $description){

        $sql = "INSERT INTO matches (id_team1, id_team2, id_stade, time, description) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute([$idTeam1, $idTeam2, $idStade, $time, $picture, $description]);
        return 1;
    }

    protected function updateMatchDB($id, $idTeam1, $idTeam2, $idStade, $time, $picture, $description){

        $sql = "UPDATE matches SET id_team1 = ?, id_team2 = ?, id_stade = ?, time = ?, description = ? WHERE id_match = ?";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute([$idTeam1, $idTeam2, $idStade, $time, $picture, $description, $id]);
        return 1;
    }

    protected function deleteMatchDB($id){

        $sql = "DELETE FROM matches WHERE id_match = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return 1;
    }


    


}
