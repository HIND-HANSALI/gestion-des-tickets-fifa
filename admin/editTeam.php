<?php 
$path='Update Team';
require_once('../controller/teamController.php');
$TeamController = new TeamController();
$result=$TeamController ->getOneTeam();
$TeamController ->updateTeam();
// print_r($result);
// die;


?>
<!DOCTYPE html>
<html lang="en-US" class="dark">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <?php include('../include/dashboard/head.php'); ?>
    </head>
    <body>
        <!-- Team MODAL -->
                <div class="modal-content background ">
                    <div class="modal-header">
                        <h5 class="" id="exampleModalLabel">Update Team</h5>
                        <button type="button" class="px-1 p-0 m-0" data-bs-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body pt-0 pb-1">
                        <form id="form" method="POST"  enctype="multipart/form-data">
                        <img class="rounded-circle" src="../assets/img/uploads/<?= $result['picture']?>" style="width: 100px;"  alt="" /> 
                        <div class="mb-0">
                                <label class="col-form-label">Picture</label>
                                <input id="PictureInput" class="dropify" data-max-file-size-preview="10M" data-height="100" type="file"  name="my_image"/>
                                <div id="ValidatePicture" class="text-success"></div>
                                
                            </div>
                             <!-- <div class="mb-0">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="equipe_title" name="nom"/>
                        </div>   -->
                            <div class="mb-0">
                                <label class="col-form-label">Nationality</label>
                                <input type="text" class="form-control" value="<?= $result['nationality']?>" id="NationalityInput" name="nationality" />
                                <div id="ValidateNationality"></div>
                            </div>
                            <div class="mb-0">
                            <label class="form-label">Groupe</label>
                            <input type="text" class="form-control" value="<?= $result['groupe']?>"  id="equipe_groupe" name="groupe"/>
                            <div id="ValidatePicture" class="text-success"></div>
                        </div> 
                           
                           
                            
                            
                            
                           
                           
                            
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-outline-light text-black" data-bs-dismiss="modal">Cancel</button>
                                 <button id="updateMatch" type="submit" name="updateTeamForm" class="btn btn-warning text-black">Update</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            
       <?php include('../include/dashboard/scripts.php'); ?>
    </body>
</html>
