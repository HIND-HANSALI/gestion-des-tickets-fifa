<?php 

include_once('database.php');  // Path to the DataBase

class Teams extends Connection{

    protected function getTeamsDB(){

        $sql = "SELECT * FROM teams";
        $stmt = $this ->connect()->prepare($sql);//sql injection
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    

    protected function getOneTeamDB($id){

        $sql = "SELECT * FROM teams WHERE id_team = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }
    // create equipe
    protected function addTeamDB($nationality,$groupe,$picture){

        $sql = "INSERT INTO teams (nationality,picture,groupe) VALUES (?, ?, ?)";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$nationality,$picture,$groupe]);
        //  return 1;
    }

    protected function updateTeamDB($nationality,$groupe,$picture,$idTeam){

        $sql = "UPDATE teams SET  nationality= ?, groupe = ?, picture = ? WHERE id_team = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$nationality,$groupe,$picture,$idTeam]);
        return 1;
    }

    protected function deleteTeamDB($id){

        $sql = "DELETE FROM teams WHERE id_team = ?";
        $stmt = $this->connect() -> prepare($sql);
        $stmt->execute([$id]);
        return 1;
    }


    




    
}