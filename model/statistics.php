<?php

include_once('database.php');  // Path to the DataBase
class Statistics extends Connection{
function countMatchesDB(){

    global $conn;
    //SQL SELECT
    $sql="SELECT count(id_match) as matches FROM matches";
    
    $stmt = $this ->connect()->prepare($sql);//sql injection
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;

  }
  function countTeamsDB(){

    global $conn;
    //SQL SELECT
    $sql="SELECT count(id_team) as teams FROM teams";
    
    $stmt = $this ->connect()->prepare($sql);//sql injection
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;

  }
  function countStadesDB(){

    global $conn;
    //SQL SELECT
    $sql="SELECT count(id_stade) as stades  FROM stades";
    
    $stmt = $this ->connect()->prepare($sql);//sql injection
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;

  }
}


  
  
  ?>