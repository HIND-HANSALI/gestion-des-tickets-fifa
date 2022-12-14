 <?php
    // Page Title
    $path = 'Stades';
    session_start();
    require_once('admin.php');
    // Requiring Controllers 
    require_once('../controller/stadeController.php');

    // instanciate the class 
    $StadeController = new StadeController();
    // Read methods
    $AllStades = $StadeController -> getStades();
    $StadeController -> addStade();
    $StadeController -> deleteStade();
    $StadeController->updateStade();


    if(isset($_POST['searchbtn'])){
        // echo"searching";
        $AllStades = $StadeController -> searchStade();
        // if($AllTeams==NULL)
        // $AllTeams=[];
    }else{
        // echo "not searching";
        $AllStades = $StadeController -> getStades();

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
                                        <h5 class="mb-0" >All Stades</h5>
                                    </div>
                                    <div class="justify-content-end">
                                        <a class="btn rounded-pill btn-success px-lg-3" onclick="createStade()">
                                            <i class="fas fa-plus mr-2"></i>
                                            <b>Add Stade</b>
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
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Location </th>
                                                        <th scope="col">Capacity</th>
                                                        <th class="text-end" scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(empty($AllStades))
                                                            echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                                                        else{
                                                            foreach($AllStades As $stade){ ?>
                                                            <tr class="align-middle" id="Stade<?= $stade['id_stade']; ?>">
                                                                <td class="col-1"><?=$stade['id_stade']; ?></td>
                                                                <td class="text-nowrap">
                                                                    <img id="StadePicture<?= $stade['id_stade']; ?>" src="<?=$stade['picture']; ?>" alt="" style="width:3rem;"/>
                                                                </td>
                                                                <td class="text-nowrap"><?=$stade['name']; ?></td>
                                                                <td class="text-nowrap"><?=$stade['location']; ?></td>
                                                                <td class="text-nowrap"><?=$stade['capacity']; ?></td>
                                                                <td class="text-end">
                                                                    <a href="#" onclick="Getstade('<?= $stade['id_stade']; ?>','<?= $stade['name']; ?>','<?= $stade['location']; ?>','<?= $stade['capacity']; ?>')" class="btn btn-sm btn-warning">Edit</a>
                                                                    <a href="#" onclick="DeleteStade('<?= $stade['id_stade']; ?>') " class="btn btn-sm btn-danger">Delete</a>
                                                                </td>
                                                            </tr>
                                                    <?php }
                                                    } ?>
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
                                <p class="mb-0 text-600">YM</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </main>
        <!-- ===============================================-->
        <!--    End of Main Content-->
        <!-- ===============================================-->
        <!-- stade MODAL -->
        <div class="modal fade" id="stadeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mt-3 mb-1">
                <div class="modal-content background ">
                    <div class="modal-header">
                        <h5 class="" id="exampleModalLabel">Add Stade</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0 pb-1">
                        <form id="form" method="POST" enctype="multipart/form-data">
                            <div class="mb-0">
                                <label class="col-form-label">Picture</label>
                                <input id="PictureInput" class="dropify" data-max-file-size-preview="10M" data-height="100" type="file"  name="picture"  />
                                <div id="ValidatePicture" class="text-success"></div>
                            </div>
                            <div class="mb-0">
                                <label class="col-form-label">name</label>
                                <input type="text" step=0.01 class="form-control" id="NameInput" name="name" />
                            </div>
                            
                            <input type="hidden" id="IdInput" name="id" />
                            <div class="mb-0">
                                <label class="col-form-label" for="location">location</label>
                                <input type="text" step=0.01 class="form-control" id="locationInput" name="location" /> 
                            </div>
                            <div class="mb-0">
                                <label for="capacity" class="col-form-label">capacity</label>
                                <input class="form-control" type="number" required id="CapacityInput" name="capacity" />
                            </div>  
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-outline-light text-black" data-bs-dismiss="modal">Cancel</button>
                                <button id="savestade" type="submit" name="addstadeForm" class="btn btn-primary">Save</button>
                                <div id="editstade" style="display: none">
                                    <button id="updatestade" type="submit" name="updatestadeForm" class="btn btn-warning text-black">Update</button>
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
