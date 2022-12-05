<?php
    // Page Title
    $path = 'Matches';

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
    $AllMatches = $MatchController -> getMatches();
    $AllTeams = $TeamController -> getTeams();
    $AllStades = $StadeController -> getStades();
    $AllStatus = $StatusController -> getStatus();


?>

<!DOCTYPE html>
<html lang="en-US" class="dark">
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
                                                        <th scope="col">Picture</th>
                                                        <th scope="col">Team 1</th>
                                                        <th scope="col">Team 2</th>
                                                        <th scope="col">Stade</th>
                                                        <th scope="col">Date & Time</th>
                                                        <th class="text-center" scope="col">Status</th>
                                                        <th class="text-end" scope="col">Price USD($)</th>
                                                        <th class="text-end" scope="col">Description</th>
                                                        <th class="text-end" scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($AllMatches AS $match){ ?>
                                                        <tr class="align-middle">
                                                            <td class="text-nowrap">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-xl">
                                                                        <img class="rounded-circle" src="<?=$match['picture']; ?>" alt="" />
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap"><?=$match['team1']; ?></td>
                                                            <td class="text-nowrap"><?=$match['team2']; ?></td>
                                                            <td class="text-nowrap"><?=$match['stade']; ?></td>
                                                            <td class="text-nowrap"><?=$match['time']; ?></td>
                                                            <td>
                                                                <span class="badge badge rounded-pill d-block p-2 badge-soft-<?= $match['status'] == "Soon" ? "secondary" :( $match['status'] == "In Progress" ? "info": "success" ); ?>"><?= $match['status'];?></span>
                                                            </td>
                                                            <td class="text-end"><?=$match['price']; ?></td>
                                                            <td class="text-truncate mb-1"><div style="max-width: 5rem;"><?=$match['description']; ?></div></td>
                                                            <td class="text-end">
                                                                <a href="#" onclick="GetProduct('<?= $product['idProduct']; ?>','<?= $product['idCategory']; ?>')" class="btn btn-sm btn-warning">Edit</a>
                                                                <a href="#" onclick="DeleteProduct('<?= $product['idProduct']; ?>')" class="btn btn-sm btn-danger">Delete</a>
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
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mt-3 mb-1">
                <div class="modal-content background ">
                    <div class="modal-header">
                        <h5 class="" id="exampleModalLabel">Add Match</h5>
                        <button type="button" class="fa fa-xmark px-1 p-0 m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0 pb-1">
                        <form id="form" method="POST" enctype="multipart/form-data">
                            <div class="mb-0">
                                <label class="col-form-label">Picture</label>
                                <input id="PictureInput" class="dropify" data-max-file-size-preview="10M" data-height="100" type="file"  name="picture"  />
                                <div id="ValidatePicture" class="text-success"></div>
                                
                            </div>
                            <!-- <div class="mb-0">
                                <label class="col-form-label">Nationality</label>
                                <input type="text" class="form-control" id="NationalityInput" name="nationality" />
                                <div id="ValidateNationality"></div>
                            </div> -->  
                            <div class="mb-0">
                                <label class="col-form-label">Team 1</label>
                                <select class="form-select" id="Team1Input" name="idteam1" required>
                                    <option value selected disabled>Please select</option>
                                    <?php foreach($AllTeams as $team) {
                                        echo '<option value="'.$team['id_team'].'">'.$team['nationality'].'</option>';
                                    } ?>    
                                    
                                </select>
                            </div>
                            <div class="mb-0">
                                <label class="col-form-label">Team 2</label>
                                <select class="form-select" id="Team2Input" name="idteam2" required>
                                    <option value selected disabled>Please select</option>
                                    <?php foreach($AllTeams as $team) {
                                        echo '<option value="'.$team['id_team'].'">'.$team['nationality'].'</option>';
                                    } ?>    
                                    
                                </select>
                            </div>
                            <div class="mb-0">
                                <label class="col-form-label">Stades</label>
                                <select class="form-select" id="StadeInput" name="idstade" required>
                                    <option value selected disabled>Please select</option>
                                    <?php foreach($AllStades as $stade) {
                                        echo '<option value="'.$stade['id_stade'].'">'.$stade['name'].'</option>';
                                    } ?>    
                                    
                                </select>
                            </div>
                            <div class="mb-0">
                                <label class="col-form-label">Status</label>
                                <select class="form-select" id="StatusInput" name="idstatus" required>
                                    <option value selected disabled>Please select</option>
                                    <?php foreach($AllStatus as $status) {
                                        echo '<option value="'.$status['id_status'].'">'.$status['name'].'</option>';
                                    } ?>    
                                    
                                </select>
                            </div>
                            <input type="hidden" id="IdInput" name="id" />
                            <div class="mb-0">
                                <label class="col-form-label">Price $(USD)</label>
                                <input type="number" step=0.01 class="form-control" id="PriceInput" name="price" /> 
                                <div id="ValidatePrice"></div>
                            </div>
                            <div class="mb-0">
                                <label for="taskDate" class="col-form-label">Date</label>
                                <input class="form-control" type="datetime-local" required id="DateInput" name="dateInput" />
                            </div>  
                            <div class="mb-0">
                                <label class="col-form-label">Description</label>
                                <textarea class="form-control" id="DescriptionInput" rows="8" name="description"></textarea>
                                <span id="ValidateDescription"></span>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-outline-light text-black" data-bs-dismiss="modal">Cancel</button>
                                <button id="saveProduct" type="submit" name="addProductForm" class="btn btn-primary">Save</button>
                                <div id="editProduct" style="display: none">
                                    <!-- <button type="submit" id="deleteValidation" name="deleteProductForm" class="btn btn-danger text-black">Delete</button> -->
                                    <button id="updateProduct" type="submit" name="updateProductForm" class="btn btn-warning text-black">Update</button>
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
