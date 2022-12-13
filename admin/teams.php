<?php
    // Page Title
    $path = 'Teams';
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
    $TeamController -> updateTeam();
    

    $TeamController -> addTeam();
    $TeamController -> deleteTeam();
    $AllTeams =[];
    if(isset($_POST['searchbtn'])){
        // echo"searching";
        $AllTeams =$TeamController -> searchTeam();
        // if($AllTeams==NULL)
        // $AllTeams=[];
    }else{
        // echo "not searching";
        $AllTeams = $TeamController -> getTeams();

    }
    
    // print_r($_REQUEST);
    // die;

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
                                        <h5 class="mb-0" >All Teams</h5>
                                    </div>
                                    <div class="justify-content-end">
                                        <a class="btn rounded-pill btn-success px-lg-3" onclick="createTeam()">
                                            <i class="fas fa-plus mr-2"></i>
                                            <b>Add Team</b>
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
                                                        <th scope="col">Id</th>
                                                        <th scope="col">Picture</th>
                                                        <th scope="col">nationality</th>
                                                        <th scope="col">groupe</th>
                                                        <th class="text-end" scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($AllTeams AS $team){ ?>
                                                        <tr class="align-middle" id="Team<?=$team['id_team']; ?>">
                                                            <td class="text-nowrap"><?=$team['id_team']; ?></td>
                                                            <td class="text-nowrap">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-xl">
                                                                        <img class="rounded-circle" src="../assets/img/uploads/<?= $team['picture'];?>" alt="" />
                                                                    
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td id="TeamNationality<?= $team['id_team']; ?>" class="text-nowrap"><?=$team['nationality']; ?></td>
                                                            <td id="TeamGroupe<?= $team['id_team']; ?>" class="text-nowrap"><?=$team['groupe']; ?></td>
                                                            
                                                            
                                                            <td class="text-end">
                                                            <a onclick="GetTeam('<?= $team['id_team']; ?>')" class="btn btn-sm btn-warning">Edit</a>

                                                            <a onclick="DeleteTeam('<?= $team['id_team']; ?>') " class="btn btn-sm btn-danger">Delete</a>
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
                                <p class="mb-0 text-600">HH</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </main>
        <!-- ===============================================-->
        <!--    End of Main Content-->
        <!-- ===============================================-->
        <!-- Team MODAL -->
        <div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mt-3 mb-1">
                <div class="modal-content background ">
                    <div class="modal-header">
                        <h5 class="" id="exampleModalLabel">Add Team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0 pb-1">
                        <form id="form" method="POST"  enctype="multipart/form-data">
                        <input type="hidden" id="IdInput" name="id" />
                            <div class="mb-0">
                                <label class="col-form-label">Picture</label>
                                <input id="PictureInput" class="dropify" data-max-file-size-preview="10M" data-height="100" type="file"  name="my_image"/>
                                <div id="ValidatePicture" class="text-success"></div>
                                
                            </div>
                            <div class="mb-0">
                                <label class="col-form-label">Nationality</label>
                                <input type="text" class="form-control" id="NationalityInput" name="nationality" />
                                <div id="ValidateNationality"></div>
                            </div>
                            <div class="mb-0">
                            <label class="form-label">Groupe</label>
                            <input type="text" class="form-control" id="GroupeInput" name="groupe"/>
                            <div id="ValidatePicture" class="text-success"></div>
                        </div> 
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-outline-light text-black" data-bs-dismiss="modal">Cancel</button>
                                <button id="saveTeams" type="submit" name="addTeamForm" class="btn btn-primary">Save</button>
                                <div id="editTeams" style="display: none">
                                    <!-- <button type="submit" id="deleteValidation" name="deleteMatchForm" class="btn btn-danger text-black">Delete</button> -->
                                    <button id="updateTeam" type="submit" name="updateTeamForm" class="btn btn-warning text-black">Update</button>
                
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
