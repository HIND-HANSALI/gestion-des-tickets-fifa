<?php

include_once('database.php');  // Path to the DataBase

class Users extends Connection{


    protected function getUsersDB(){
        $sql = "SELECT * FROM users";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function setRoleDB($id){

        $sql = "SELECT * FROM users WHERE id_user = ?";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        if($result['id_role'] == 2){
            $role = 1;
        }
        if($result['id_role'] == 1){
            $role = 2;
        }

        $sql = "UPDATE users SET id_role = ? WHERE id_user = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$role, $id]);
        return 1;
    }

    protected function deleteUserDB($id){
        $sql = "DELETE FROM users WHERE id_user = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$id]);
        return 1;
    }


}