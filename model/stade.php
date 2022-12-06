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

    


    
}