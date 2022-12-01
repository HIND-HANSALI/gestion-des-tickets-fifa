<?php
include_once('database.php');  // Path to the DataBase

class Matches extends Connection {
    
    protected function getMatchesDB(){

        $sql = "SELECT * FROM matches";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function getMatchDBDB($id){

        $sql = "SELECT * FROM matches WHERE id = ?";
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

        $sql = "UPDATE matches SET id_team1 = ?, id_team2 = ?, id_stade = ?, time = ?, description = ? WHERE id = ?";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute([$idTeam1, $idTeam2, $idStade, $time, $picture, $description, $id]);
        return 1;
    }

    protected function deleteMatchDB($id){

        $sql = "DELETE FROM matches WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return 1;
    }

}
