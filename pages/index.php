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
        <div class="header-search">
            <form action="" class="w-100 d-flex justify-content-center">
                <div class="inputes-field">
                    <div class="inputs">
                        <input type="text" placeholder="Search by matches, team, stadium, and more" class="input-serach" name="search">
                        <div class="input-date">|
                            <!-- <i class="fa-solid fa-calendar-days"></i> -->
                            <input type="date" name="daterange" placeholder="Select date" />
                        </div>|
                    </div>
                    <button class="btn-serach" type="submit" href="../pages/search.php"><i class="fa-solid fa-magnifying-glass search-icon"></i><span>Search</span></button>
                </div>
            </form>
        </div>
    </section>
    <section class="projects">
        <div class="all d-flex justify-content-between align-items-center">
            <h3>Upcoming Matchs</h3>
            <a href="allmatches.php">View all ></a>
        </div>
        <div class="content">
            <?php foreach($FourMatches as $match){
                $Date = new DateTimeImmutable($match['time']);
                $Month = $Date->format('M');
                $Day = $Date->format('d');
                ?>
                <div class="project-card">
                    <div class="project-image" style="background-image: url(<?=$match['picture']; ?>);">
                    </div>
                    <div class="project-info">
                        <div class="project-date">
                            <p><?=$Month; ?><span class="d-block"><?=$Day; ?> </span></p>
                        </div>
                        <div class="project-detai">
                            <h6><?=$match['team1']; ?> vs <?=$match['team2']; ?></h6>
                            <span class="d-block"><b>$ </b><?=$match['price']; ?></span>
                            <span class="d-block"><i class="fa-solid fa-location-dot me-1"></i><?=$match['stade']; ?></span>
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
            <a href="allteams.php">View all ></a>
        </div>
        <div class="content">
        <?php foreach($FourTeams AS $team){ ?>
            <div class="project-card">
                <div class="project-image" style="background-image: url(<?= $team['picture']; ?>);">
                </div>
                <div class="project-detais">
                    <h6><?=$team['nationality']; ?> National Team</h6>
                    <span class="d-block"><b>Groupe : </b><?=$team['groupe']; ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <section class="projects">
        <div class="all d-flex justify-content-between align-items-center">
            <h3>Browse Available Stadiums</h3>
            <a href="allstades.php">View all ></a>
        </div>
        <div class="content">
        <?php foreach($FourStades As $stade){ ?>
            <div class="project-card">
                <div class="project-image" style="background-image: url(<?=$stade['picture']; ?>);">
                </div>
                <div class="project-detais">
                    <h6 class="m-1"><?=$stade['name']; ?></h6>
                    <span class="d-block ms-3">Capacity: <?=$stade['capacity']; ?></span>
                    <span class="d-block"><i class="fa-solid fa-location-dot mx-1"></i><?=$stade['location']; ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
<?php
include_once "../include/footer.php"
?>