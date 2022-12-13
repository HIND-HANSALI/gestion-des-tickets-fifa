<?php 

include_once('database.php');  // Path to the DataBase

class Stades extends Connection{
    protected function getStadesDB(){

        $sql = "SELECT * FROM stades";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function getOneStadeDB($id){

        $sql = "SELECT * FROM stades WHERE id_stade = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    protected function addStadeDB( $name, $location, $capacity, $picture){


        $sql = "INSERT INTO stades (name, location, capacity, picture) VALUES (?, ?, ?, ?)";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([ $name, $location, $capacity, $picture]);
        return 1;
    }

    protected function updateStadeDB($name, $location, $capacity, $picture,$id){

        $sql = "UPDATE stades SET name = ?, location = ?, capacity = ?, picture = ? WHERE id_stade = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$name, $location, $capacity, $picture ,$id]);
        return 1;
    }
    
    protected function updateStadenoimageDB($name, $location, $capacity,$id){

        $sql = "UPDATE stades SET name = ?, location = ?, capacity = ? WHERE id_stade = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$name, $location, $capacity,$id]);
        return 1;
    }

    protected function deleteStadeDB($id){

        $sql = "DELETE FROM stades WHERE id_stade = ?";
        $stmt = $this->connect() -> prepare($sql);
        $stmt->execute([$id]);
        return 1;
    }


    protected function getFourStadesDB(){
        $sql = "SELECT * FROM stades ORDER BY id_stade DESC LIMIT 4";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    function searchStadeDB($search){
        $sql="SELECT * FROM stades WHERE name like '%$search%'";
        $result = $this->connect()->prepare($sql);
        // $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $stade = $result->fetchAll();
    
        // $_SESSION["search"] = "search";
        return $stade;
     } 
    


    
}