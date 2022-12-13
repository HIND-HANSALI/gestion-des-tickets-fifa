<?php
    session_start();
    $title = "FifaWorldCup";
    include_once dirname(__DIR__) . "/include/header.php";

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
     $FourTeams = $TeamController ->  FourTeams();;
     $FourStades = $StadeController ->FourStades();
?>
<body style=" background-color: #E1E1E1; overflow-x: hidden;">
    <?php
        include_once dirname(__DIR__) . "/include/navbar.php"
    ?>
    <section class="header-background">
        <div class="header-description">
            <h1>Exclusive Matchs, priceless moments</h1>
        </div>
    </section>
    <section class="projects">
        <div class="all d-flex justify-content-between align-items-center">
            <h3>Upcoming Matchs</h3>
            <a href="allmatches.php">view all ></a>
        </div>
        <div class="content">
            <?php foreach($FourMatches as $match){
                $Date = new DateTimeImmutable($match['time']);
                $Month = $Date->format('M');
                $Day = $Date->format('d');
                ?>
                <div class="project-card">
                    <div class="project-image">
                        <img src="../assets/img/feH6rS1pFNK5DYyn_768x432.jpg" alt="">
                    </div>
                    <div class="project-info">
                        <div class="project-date">
                            <p><?=$Month; ?><span class="d-block"><?=$Day; ?> </span></p>
                        </div>
                        <div class="project-detai">
                            <h6><?=$match['team1']; ?> vs <?=$match['team2']; ?></h6>
                            <span class="d-block"><b>$</b><?=$match['price']; ?></span>
                            <span class="d-block"><i class="fa-solid fa-location-dot mx-1"></i><?=$match['stade']; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <section class="Group">
        <img src="../assets/img/FIFA-World-Cup-Qatar-2022-Final-groups.avif" alt="">
    </section>
    <section class="projects">
        <div class="all d-flex justify-content-between align-items-center">
            <h3>Browse National Teams</h3>
            <a href="equipe.php">view all ></a>
        </div>
        <div class="content">
        <?php foreach($FourTeams AS $team){ ?>
            <div class="project-card">
                <div class="project-image">
                    <img src="../assets/img/feH6rS1pFNK5DYyn_768x432.jpg" alt="">
                    <!-- <img src="../assets/img/uploads/<?= $team['picture'];?>" style="width: 100px;" alt=""> -->
                </div>
                <div class="project-detais">
                    <h6><?=$team['nationality']; ?> National Team</h6>
                    <span class="d-block"><?=$team['groupe']; ?></span>
                    <span class="d-block"><i class="fa-solid fa-location-dot mx-1"></i><?=$team['nationality']; ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <section class="projects">
        <div class="all d-flex justify-content-between align-items-center">
            <h3>Browse Available Stadiums</h3>
            <a href="stade.php">view all ></a>
        </div>
        <div class="content">
        <?php foreach($FourStades As $stade){ ?>
            <div class="project-card">
                <div class="project-image">
                    <img src="../assets/img/feH6rS1pFNK5DYyn_768x432.jpg" alt="">
                </div>
                <div class="project-detais">
                    <h6><?=$stade['name']; ?></h6>
                    <span class="d-block">Capacity:<?=$stade['capacity']; ?></span>
                    <span class="d-block"><i class="fa-solid fa-location-dot mx-1"></i><?=$stade['location']; ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
<?php
include_once "../include/footer.php"
?>