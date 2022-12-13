<?php
    $path = 'Dashboard';
    session_start();
    
    // include Controllers
    include_once('../controller/matchController.php');
    include_once('../controller/teamController.php');
    include_once('../controller/stadeController.php');

    // instantiate the controller
    $MatchController = new MatchController();
    $TeamController = new TeamController();
    $StadeController = new StadeController();

    // get matches
    $FourMatches = $MatchController -> FourMatches();
    $FourTeams = $TeamController -> FourTeams();
    $FourStades = $StadeController -> FourStades();


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
                        <div class="col-md-6 col-xxl-3">
                            <div class="card h-md-100 ecommerce-card-min-width">
                                <div class="card-header pb-0">
                                    <h6 class="mb-0 mt-2 d-flex align-items-center">
                                        Nbr des matchs joués
                                    </h6>
                                </div>
                                <div class="card-body d-flex flex-column justify-content-end">
                                    <div class="row">
                                        <div class="col">
                                            <p class="font-sans-serif lh-1 mb-1 fs-4">2300</p>
                                            <span class="badge badge-soft-success rounded-pill fs--2">+3.5%</span>
                                        </div>
                                        <div class="col-auto ps-0">
                                            <div class="echart-bar-weekly-sales h-100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-3">
                            <div class="card h-md-100">
                                <div class="card-header pb-0">
                                    <h6 class="mb-0 mt-2">Nbr des stades disponible</h6>
                                </div>
                                <div class="card-body d-flex flex-column justify-content-end">
                                    <div class="row justify-content-between">
                                        <div class="col-auto align-self-end">
                                            <div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1">58</div>
                                            <span class="badge rounded-pill fs--2 bg-200 text-primary"><span class="fas fa-caret-up me-1"></span>13.6%</span>
                                        </div>
                                        <div class="col-auto ps-0 mt-n4">
                                            <div
                                                class="echart-default-total-order"
                                                data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","Week 6","Week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}'
                                                data-echart-responsive="true"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-3">
                            <div class="card h-md-100">
                                <div class="card-body">
                                    <div class="row h-100 justify-content-between g-0">
                                        <div class="col-5 col-sm-6 col-xxl pe-2">
                                            <h6 class="mt-1">Nbr des spectateurs enregistrés</h6>
                                            <div class="fs--2 mt-3">
                                            </div>
                                        </div>
                                        <div class="col-auto position-relative">
                                            <div class="echart-market-share"></div>
                                            <div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">26M</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-3">
                            <div class="card h-md-100">
                                <div class="card-header d-flex flex-between-center pb-0">
                                    <h6 class="mb-0">Nbr des e-tickets</h6>
                                    
                                </div>
                                <div class="card-body pt-2">
                                    <div class="row g-0 h-100 align-items-center">
                                        <div class="col">
                                            <div class="d-flex align-items-center">
                                                <img class="me-3" src="" alt="" height="60" />
                                                <div>
                                                    <h6 class="mb-2">Disponible</h6>
                                                    <div class="fs--2 fw-semi-bold">
                                                        <div class="text-warning">Reserve</div>
                                                        Restant
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto text-center ps-2">
                                            <div class="fs--1 text-800">32</div>
                                            <div class="fs--1 fw-normal font-sans-serif text-primary mt-1">31</div>
                                            <div class="fs--1 text-800">32</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="card mb-3">
                            <div class="card-header border-bottom">
                                <div class="row flex-between-end">
                                    <div class="col-auto align-self-center">
                                        <h5 class="mb-0" data-anchor="data-anchor">Latest Matches</h5>
                                        <p class="mb-0 pt-1 mt-2 mb-0">
                                            Preview of the last 4 matches added to the system.
                                        </p>
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
                                                        <th class="text-end" scope="col">Capacity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($FourMatches AS $match){ ?>
                                                        <tr class="align-middle">
                                                            <td class="text-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-xxl">
                                                                        <?php 
                                                                            if(!empty($match['picture'])){
                                                                                echo '<img src="'.$match['picture'].'" style="width:3rem;" />';
                                                                            }else{
                                                                                echo '<img class="m-0" src="../assets/img/essential/frame.png" style="width:3rem;height: 2.7rem;" />';
                                                                            } 
                                                                        ?>
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
                                                            <td class="text-end"><?=$match['capacity']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 pe-lg-2 mb-3">
                            <div class="card mb-2">
                                <div class="card-header border-bottom">
                                    <div class="row flex-between-end">
                                        <div class="col-auto align-self-center">
                                            <h5 class="mb-0" data-anchor="data-anchor">Latest Teams</h5>
                                            <p class="mb-0 pt-1 mt-2 mb-0">
                                                Preview of the last 4 teams added to the system.
                                            </p>
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
                                                            <th scope="col">Nationality</th>
                                                            <th scope="col">Groupe</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($FourTeams AS $team){ ?>
                                                            <tr class="align-middle">
                                                                <td class="text-center">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-xxl">
                                                                            <?php 
                                                                                if(!empty($team['picture'])){
                                                                                    echo '<img src="../assets/img/uploads/'.$team['picture'].'" style="width:3rem;height: 3.7rem;" />';
                                                                                }else{
                                                                                    echo '<img class="m-0" src="../assets/img/essential/frame.png" style="width:3rem;" />';
                                                                                } 
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap"><?=$team['nationality']; ?></td>
                                                                <td class="text-nowrap"><?=$team['groupe']; ?></td>
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
                        <div class="col-lg-8 ps-lg-2 mb-3">
                            <div class="card mb-2">
                                <div class="card-header border-bottom">
                                    <div class="row flex-between-end">
                                        <div class="col-auto align-self-center">
                                            <h5 class="mb-0" data-anchor="data-anchor">Latest Stades</h5>
                                            <p class="mb-0 pt-1 mt-2 mb-0">
                                                Preview of the last 4 stades added to the system.
                                            </p>
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
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Location</th>
                                                            <th scope="col">Capacity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($FourStades AS $stade){ ?>
                                                            <tr class="align-middle">
                                                                <td class="text-center">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-xxl">
                                                                            <?php 
                                                                                if(!empty($stade['picture'])){
                                                                                    echo '<img src="'.$stade['picture'].'" style="width:3rem;" />';
                                                                                }else{
                                                                                    echo '<img class="m-0" src="../assets/img/essential/frame.png" style="width:3rem;" />';
                                                                                } 
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap"><?=$stade['name']; ?></td>
                                                                <td class="text-nowrap"><?=$stade['location']; ?></td>
                                                                <td class="text-nowrap"><?=$stade['capacity']; ?></td>
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
       <?php include('../include/dashboard/scripts.php'); ?>
    </body>
</html>
