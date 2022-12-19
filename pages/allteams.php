<?php
    session_start();
    $title = "FifaWorldCup";
    include_once dirname(__DIR__) . "/include/header.php";

    // include controllers 
    include_once "../controller/TeamController.php";

    // inialize controllers
    $teamController = new TeamController();

    // get all teams

        if(isset($_POST['searchbtn'])){
            $AllTeams =$teamController -> searchTeam();
        }else{
            $AllTeams = $teamController -> getTeams();
        }


?>
    <body style=" background-color: #E1E1E1; overflow-x: hidden;">
<?php
include_once dirname(__DIR__) . "/include/navbar.php"
?>
    <section class="projects">
        <div class="all  d-flex justify-content-between align-items-center">
            <h3 class="">Browse National Teams</h3>
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <div class="search-box">
                        <form method="POST" class="position-relative">
                            <input name="search" class="form-control search-input" placeholder="Search..." />
                            <i class="fas fa-search search-box-icon"></i>
                            <button type="submit" name="searchbtn" class="d-none"></button>
                        </form>
                    </div>
                </li>
            </ul>
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