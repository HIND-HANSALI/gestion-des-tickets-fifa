<?php
    session_start();
    $title = "FifaWorldCup";
    include_once dirname(__DIR__) . "/include/header.php";

    // include controllers
    include_once "../controller/StadeController.php";

    // inialize controllers
    $stadeController = new StadeController();

    // get all teams

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchbtn'])){
            $AllStades = $stadeController -> searchStade();
        }else{
            $AllStades = $stadeController -> getStades();
        }

?>
    <body style=" background-color: #E1E1E1; overflow-x: hidden;">
<?php
include_once dirname(__DIR__) . "/include/navbar.php"
?>
    <section class="projects">
        <div class="all  d-flex justify-content-between align-items-center">
            <h3 class="">Browse Available Stadiums</h3>
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