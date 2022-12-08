<?php
//calcul nbr des equipes
function countEquipes(){
    $sql="SELECT * FROM teams";
    $stmt = $this ->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return count($result);
}






?>