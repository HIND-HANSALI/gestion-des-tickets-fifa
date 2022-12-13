<?php
    // Page Title
    $path = 'Matches';
    session_start();

    // Requiring Controllers 
    require_once('../controller/matchController.php');
    require_once('../controller/teamController.php');
    require_once('../controller/stadeController.php');
    require_once('../controller/statusController.php');

    // instanciate the class
    $MatchController = new MatchController();
    $TeamController = new TeamController();
    $StadeController = new StadeController();
    $StatusController = new StatusController();

    // Read methods
    // $AllMatches = $MatchController -> getMatches();
    $AllTeams = $TeamController -> getTeams();
    $AllStades = $StadeController -> getStades();
    $AllStatus = $StatusController -> getStatus();

    $MatchController -> addMatch();
    $MatchController -> deleteMatch();
    $MatchController -> updateMatch();
     /* print_r($_SERVER['REQUEST_METHOD']); */
     /* die; */

     if(isset($_POST['searchbtn'])){
        
        $AllMatches = $MatchController -> searchMatch();
       
    }else{
        
        $AllMatches = $MatchController -> getMatches();

    }

?>

<!DOCTYPE html>
<html lang="en-US">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <?php include('../include/dashboard/head.php'); ?>
    </head>
    <body>
        <main class="main" id="top">
            <div class="container-fluid" data-layout="container">
                <?php include('../include/dashboard/nav-mobile.php'); ?>
                <div class="content">
                    <?php include('../include/dashboard/nav-desk.php'); ?>
                    <div class="row g-3 mb-3">
                        <h1><?=$path; ?> </h1>
                    </div>
                    <div class="row g-0">
                        <div class="card mb-3">
                            <div class="card-header border-bottom">
                                <div class=" d-flex justify-content-between">
                                    <div class="col-auto align-self-center">
                                        <h5 class="mb-0" >All Matches</h5>
                                    </div>
                                    <div class="justify-content-end">
                                        <a class="btn rounded-pill btn-success px-lg-3" onclick="createModule()">
                                            <i class="fas fa-plus mr-2"></i>
                                            <b>Add Match</b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="tab-content">
                                    <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-f3ee3586-6986-435d-af14-04f95ce3db36" id="dom-f3ee3586-6986-435d-af14-04f95ce3db36">
                                        <div class="table-responsive scrollbar">
                                            <table class="table table-hover table-striped overflow-hidden">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Picture</th>
                                                        <th scope="col">Team 1</th>
                                                        <th scope="col">Team 2</th>
                                                        <th scope="col">Stade</th>
                                                        <th scope="col">Date & Time</th>
                                                        <th class="text-center" scope="col">Status</th>
                                                        <th class="text-end" scope="col">Price USD($)</th>
                                                        <th class="text-end" scope="col">Capacity</th>
                                                        <th class="text-end" scope="col">Description</th>
                                                        <th class="text-end" scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($AllMatches AS $match){ ?>

                                                        <tr class="align-middle" id="Match<?=$match['id_match']; ?>">
                                                            <td class="text-nowrap"><?=$match['id_match']; ?></td>
                                                            <td class="text-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-xxl">
                                                                        <?php 
                                                                            if(!empty($match['picture'])){
                                                                                echo '<img id="MatchPicture'. $match['id_match'].'" src="'.$match['picture'].'" style="width:3rem;" />';
                                                                            }else{
                                                                                echo '<img class="m-0" src="../assets/img/essential/frame.png" style="width:3rem;height: 2.7rem;" />';
                                                                            } 
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td id="MatchTeam1<?=$match['id_match']; ?>" class="text-nowrap"><?=$match['team1']; ?></td>
                                                            <td id="MatchTeam2<?=$match['id_match']; ?>" class="text-nowrap"><?=$match['team2']; ?></td>
                                                            <td id="MatchStade<?=$match['id_match']; ?>" class="text-nowrap"><?=$match['stade']; ?></td>
                                                            <td id="MatchTime<?=$match['id_match']; ?>" class="text-nowrap"><?=$match['time']; ?></td>
                                                            <td>
                                                                <span class="badge badge rounded-pill d-block p-2 badge-soft-<?= $match['status'] == "Soon" ? "secondary" :( $match['status'] == "In Progress" ? "info": "success" ); ?>" id="MatchStatus<?=$match['id_match']; ?>"><?= $match['status'];?></span>
                                                            </td>
                                                            <td class="text-end" id="MatchPrice<?=$match['id_match']; ?>" ><?=$match['price']; ?></td>
                                                            <td class="text-end" id="MatchCapacity<?=$match['id_match']; ?>" ><?=$match['capacity']; ?></td>
                                                            <td class="text-truncate mb-1"><div style="max-width: 5rem;" id="MatchDescription<?=$match['id_match']; ?>" ><?=$match['description']; ?></div></td>
                                                            <td class="text-center" scope="col">
                                                                <a href="#" onclick=" getMatch('<?= $match['id_match']; ?>','<?= $match['id_team1']; ?>','<?= $match['id_team2']; ?>','<?= $match['id_stade']; ?>') " class="btn btn-sm btn-warning">Edit</a>
                                                                <a href="#" onclick=" deleteMatch('<?= $match['id_match']; ?>') " class="btn btn-sm btn-danger">Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <footer class="footer">
                        <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-600">
                                    Powered By ... <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" />
                                    2022 &copy; <a href="#"></a>
                                </p>
                            </div>
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-600">AK</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </main>
        <!-- ===============================================-->
        <!--    End of Main Content-->
        <!-- ===============================================-->
        <!-- Match MODAL -->
        <div class="modal fade" id="matchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mt-3 mb-1">
                <div class="modal-content background ">
                    <div class="modal-header">
                        <h5 class="" id="exampleModalLabel">Add Match</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0 pb-1">
                        <form id="form" method="POST" enctype="multipart/form-data">
                            <div class="mb-0">
                                <label class="col-form-label">Picture</label>
                                <input id="PictureInput" class="dropify" data-max-file-size-preview="10M" data-height="100" type="file"  name="picture" />
                                <div id="ValidatePicture" class="text-success"></div>
                                
                            </div>
                            <div class="mb-0">
                                <label class="col-form-label">Team 1</label>
                                <select class="form-select" id="Team1Input" name="idTeam1" required>
                                    <option value selected disabled>Please select</option>
                                    <?php foreach($AllTeams as $team) {
                                        echo '<option value="'.$team['id_team'].'">'.$team['nationality'].'</option>';
                                    } ?>    
                                    
                                </select>
                            </div>
                            <div class="mb-0">
                                <label class="col-form-label">Team 2</label>
                                <select class="form-select" id="Team2Input" name="idTeam2" required>
                                    <option value selected disabled>Please select</option>
                                    <?php foreach($AllTeams as $team) {
                                        echo '<option value="'.$team['id_team'].'">'.$team['nationality'].'</option>';
                                    } ?>    
                                    
                                </select>
                            </div>
                            <div class="mb-0">
                                <label class="col-form-label">Stades</label>
                                <select class="form-select" id="StadeInput" name="idStade" required>
                                    <option value selected disabled>Please select</option>
                                    <?php foreach($AllStades as $stade) {
                                        echo '<option value="'.$stade['id_stade'].'">'.$stade['name'].'</option>';
                                    } ?>    
                                    
                                </select>
                            </div>
                            <div class="mb-0">
                                <label class="col-form-label">Status</label>
                                <select class="form-select" id="StatusInput" name="idStatus" required>
                                    <option value selected disabled>Please select</option>
                                    <?php foreach($AllStatus as $status) {
                                        echo '<option value="'.$status['id_status'].'">'.$status['name'].'</option>';
                                    } ?>    
                                    
                                </select>
                            </div>
                            <input type="hidden" id="IdInput" name="id" />
                            <div class="mb-0">
                                <label class="col-form-label">Price $(USD)</label>
                                <input type="number" step=0.01 class="form-control" id="PriceInput" name="price" required/> 
                                <div id="ValidatePrice"></div>
                            </div>
                            <div class="mb-0" id="CapacityHolder">
                                <label class="col-form-label">Capacity</label>
                                <input type="number" step=0.01 class="form-control" id="CapacityInput" name="capacity" /> 
                                <div id="ValidatePrice"></div>
                            </div>
                            <div class="mb-0">
                                <label for="taskDate" class="col-form-label">Date</label>
                                <input class="form-control" type="datetime-local" required id="DateInput" name="time" required/>
                            </div>  
                            <div class="mb-0">
                                <label class="col-form-label">Description</label>
                                <textarea class="form-control" id="DescriptionInput" rows="8" name="description" required></textarea>
                                <span id="ValidateDescription"></span>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-outline-light text-black" data-bs-dismiss="modal">Cancel</button>
                                <button id="saveMatch" type="submit" name="addMatchForm" class="btn btn-primary">Save</button>
                                <div id="editMatch" style="display: none">
                                    <button id="updateMatch" type="submit" name="updateMatchForm" class="btn btn-warning text-black">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       <?php include('../include/dashboard/scripts.php'); ?>
    </body>
</html>
