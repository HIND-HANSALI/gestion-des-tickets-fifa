<?php

include_once('../model/matches.php');  // Path to the matches

class MatchController extends Matches{

    public function getMatches(){
        $result = $this -> getMatchesDB();
        return $result;
    }

    public function FourMatches(){
        $result = $this -> FourMatchesDB();
        return $result;
    }

    public function addMatch(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_REQUEST['addMatchForm'])){
                
                extract($_POST);
                if( empty($idTeam1) || empty($idTeam2) || empty($idStade)  || empty($idStatus)|| empty($price) || empty($time) || empty($description) ){
                    $_SESSION['icon'] = "error";
                    $_SESSION['message'] = "Veuillez remplir tous les champs";
                    header('Location: ../admin/matches.php'); //redirect to page
                    die;
                }else{
                    if ($_FILES['picture']['name'] != "") {
                        $fileName = $_FILES['picture']['name'];
                        $fileTmpName = $_FILES['picture']['tmp_name'];
                        $fileSize = $_FILES['picture']['size'];
                        $fileError = $_FILES['picture']['error'];
                        $fileType = $_FILES['picture']['type'];
                    
                        $fileExt = explode('.', $fileName);
                        $fileActualExt = strtolower(end($fileExt));
                        $allowed = array('jpg', 'jpeg', 'png' , 'jfif');
                    
                        if (in_array($fileActualExt, $allowed)) {
                            if ($fileError === 0) {
                                if ($fileSize < 1728640) {  // 10MB max file size
                                    $fileNameNew = date("dmy") . time() . "." . $fileActualExt; //create unique name using time and date and name of 'picture'
                                    $fileDestination = "../assets/img/uploads/" . $fileNameNew;

                                    $result = $this -> addMatchDB($idTeam1, $idTeam2, $idStade, $idStatus, $price, $time, $fileDestination, $description);
                                    if($result == 1){
                                        move_uploaded_file($fileTmpName, $fileDestination);
                                        $_SESSION['icon'] = "success";
                                        $_SESSION['message'] = "Match ajouté avec succès";
                                        header('Location: '. $_SERVER['PHP_SELF']); //refresh page
                                        die;
                                    }
                                } else {
                                    $_SESSION['message'] = "erreur";
                                    $_SESSION['message'] = "La taille de fichier est trop grand!!";
                                    header('Location: ../admin/matches.php'); //to avoid alerts when refresh page
                                    die;
                                }
                            } else {
                                $_SESSION['message'] = "erreur";
                                $_SESSION['message'] = "Erreur de téléchargement de fichier!!";
                                header('Location: ../admin/matches.php'); //to avoid alerts when refresh page
                                die;
                            }
                        } else {
                            $_SESSION['message'] = "erreur";
                            $_SESSION['message'] = "Erreur de type de fichier!!";
                            header('Location: ../admin/matches.php'); //to avoid alerts when refresh page
                            die;
                        }
                    }
                }
            }
        }
    }

    public function deleteMatch(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_REQUEST['DeleteMatch'])){
                $id = $_REQUEST['DeleteMatch'];
                $result = $this -> deleteMatchDB($id);
                if($result == 1){
                    die;
                }
            }
        }
    }

    public function searchMatch(){
        $search=$_POST['search'];
        $result=$this->searchMatchDB($search); 
        return $result ;
    }


    public function updateMatch(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_REQUEST['updateMatchForm'])){
                extract($_POST);
                if( empty($idTeam1) || empty($idTeam2) || empty($idStade)  || empty($idStatus)|| empty($price) || empty($time) || empty($description) || empty($capacity) ){
                    $_SESSION['icon'] = "error";
                    $_SESSION['message'] = "Veuillez remplir tous les champs";
                    header('Location: ../admin/matches.php'); //redirect to page
                    die;
                }else{
                    if ($_FILES['picture']['name'] != "") {
                        $fileName = $_FILES['picture']['name'];
                        $fileTmpName = $_FILES['picture']['tmp_name'];
                        $fileSize = $_FILES['picture']['size'];
                        $fileError = $_FILES['picture']['error'];
                        $fileType = $_FILES['picture']['type'];
                    
                        $fileExt = explode('.', $fileName);
                        $fileActualExt = strtolower(end($fileExt));
                        $allowed = array('jpg', 'jpeg', 'png' , 'jfif');
                    
                        if (in_array($fileActualExt, $allowed)) {
                            if ($fileError === 0) {
                                if ($fileSize < 1728640) {  // 10MB max file size
                                    $fileNameNew = date("dmy") . time() . "." . $fileActualExt; //create unique name using time and date and name of 'picture'
                                    $fileDestination = "../assets/img/uploads/" . $fileNameNew;

                                    $result = $this -> UpdateMatchDB($id, $idTeam1, $idTeam2, $idStade, $idStatus, $price, $capacity, $time, $fileDestination, $description);
                                    if($result == 1){
                                        move_uploaded_file($fileTmpName, $fileDestination);
                                        $_SESSION['icon'] = "warning";
                                        $_SESSION['message'] = "Match modifie avec succès";
                                        header('Location: '. $_SERVER['PHP_SELF']); //refresh page
                                        die;
                                    }
                                } else {
                                    $_SESSION['message'] = "erreur";
                                    $_SESSION['message'] = "La taille de fichier est trop grand!!";
                                    header('Location: ../admin/matches.php'); //to avoid alerts when refresh page
                                    die;
                                }
                            } else {
                                $_SESSION['message'] = "erreur";
                                $_SESSION['message'] = "Erreur de téléchargement de fichier!!";
                                header('Location: ../admin/matches.php'); //to avoid alerts when refresh page
                                die;
                            }
                        } else {
                            $_SESSION['message'] = "erreur";
                            $_SESSION['message'] = "Erreur de type de fichier!!";
                            header('Location: ../admin/matches.php'); //to avoid alerts when refresh page
                            die;
                        }
                    }else{
                        $result = $this -> lastPicUpdateDB($id, $idTeam1, $idTeam2, $idStade, $idStatus, $capacity, $price, $time, $description);
                        if($result == 1){
                            header('Location: ../admin/matches.php'); //refresh page
                            $_SESSION['icon'] = "warning";
                            $_SESSION['message'] = "Match modifie avec succès";
                            die;
                        }
                    }
                }
            }
        }
    }


}