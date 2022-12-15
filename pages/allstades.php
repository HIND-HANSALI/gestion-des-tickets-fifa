<?php
    session_start();
    $title = "FifaWorldCup";
    include_once dirname(__DIR__) . "/include/header.php";

    // include controllers
    include_once "../controller/StadeController.php";

    // inialize controllers
    $stadeController = new StadeController();

    // get all teams
    $AllStades = $stadeController->getStades();

?>
    <body style=" background-color: #E1E1E1; overflow-x: hidden;">
<?php
include_once dirname(__DIR__) . "/include/navbar.php"
?>
    <section class="projects">
        <div class="all d-flex justify-content-between align-items-center">
            <h3>Browse Available Stadiums</h3>
        </div>
        <div class="content">
            <?php
            foreach($AllStades AS $stade ){
                ?>
            <div class="project-card">
                <div class="project-image">
                    <img src="<?=$stade['picture']; ?>" alt="">
                </div>
                <div class="project-detais">
                    <h6><?=$stade['name']; ?></h6>
                    <span class="d-block"><?=$stade['capacity']; ?></span>
                    <span class="d-block"><i class="fa-solid fa-location-dot mx-1"></i><?=$stade['location']; ?></span>
                </div>
            </div>
            <?php
            }   ?>
        </div>
    </section>
<?php
include_once "../include/footer.php"
?>