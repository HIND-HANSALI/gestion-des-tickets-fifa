<?php 

include_once('database.php');  // Path to the DataBase

class Status extends Connection{

    protected function getStatusDB(){

        $sql = "SELECT * FROM status";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}