<?php

include_once('database.php');  // Path to the DataBase
class Statistics extends Connection{

  function countMatchesDB(){
    
      //SQL SELECT
      $sql="SELECT count(id_match) as matches FROM matches m WHERE m.id_status=3 ";
      
      $stmt = $this ->connect()->prepare($sql);//sql injection
      $stmt->execute();
      $result = $stmt->fetchColumn();
      return $result;

    }
    function countTeamsDB(){
    
      //SQL SELECT
      $sql="SELECT count(id_team) as teams FROM teams";
      
      $stmt = $this ->connect()->prepare($sql);//sql injection
      $stmt->execute();
      $result = $stmt->fetchColumn();
      return $result;

    }
    function countStadesDB(){

      //SQL SELECT
      $sql="SELECT count(id_stade) as stades  FROM stades";
      
      $stmt = $this ->connect()->prepare($sql);//sql injection
      $stmt->execute();
      $result = $stmt->fetchColumn();
      return $result;

  }
  function countSpectateursDB(){
    $sql="SELECT * FROM users where id_role='2'";
    $stmt = $this ->connect()->prepare($sql);//sql injection
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result;
  }
  function countTicketsDB(){
    $sql="SELECT COUNT(id_ticket) FROM tickets";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchColumn();

    return $result;

  }
  function sommeTicketsDB(){
    $sql="select SUM(capacity) FROM stades";
    $stmt=$this->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchColumn();

    return $result;
  }

  

  
}


  
  
  ?>