<?php
    session_start();
    $title = "FifaWorldCup";
    include_once dirname(__DIR__) . "/include/header.php";

    // include controllers
    include_once "../controller/TeamController.php";

    // inialize controllers
    $teamController = new TeamController();

    // get all teams
    $AllTeams = $teamController->getTeams();


?>
    <body style=" background-color: #E1E1E1; overflow-x: hidden;">
<?php
include_once dirname(__DIR__) . "/include/navbar.php"
?>
    <section class="projects">
        <div class="all d-flex justify-content-between align-items-center">
            <h3>Browse National Teams</h3>
        </div>
        <div class="content">
            <?php
            foreach($AllTeams AS $team ){
                ?>
            <div class="project-card">
                <div class="project-image">
                    <img src="<?=$team['picture']; ?>" alt="">
                </div>
                <div class="project-detais">
                    <h6><?=$team['nationality']; ?></h6>
                    <span class="d-block"><b>Groupe : </b><?=$team['groupe']; ?></span>
                </div>
            </div>
            <?php
            }   ?>

        </div>
    </section>
<?php
include_once "../include/footer.php"
?>