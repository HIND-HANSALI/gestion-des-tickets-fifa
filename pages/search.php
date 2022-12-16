<?php
    session_start();
    $title = "FifaWorldCup";
    include_once dirname(__DIR__) . "/include/header.php";

    // include Controllers
    include_once('../controller/matchController.php');

    // instantiate the controller
    $MatchController = new MatchController();

    // get matches
    $AllMatches = $MatchController -> getMatches();

    

?>
    <body style=" background-color: #E1E1E1; overflow-x: hidden;">
<?php
include_once dirname(__DIR__) . "/include/navbar.php"
?>
<div class="header-search">
            <form action="" class="w-100 d-flex justify-content-center mt-5">
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
    <section class="projects">
        <div class="all d-flex justify-content-between align-items-center">
            <h3>Upcoming Matchs</h3>
        </div>
        <div class="content">
            <?php foreach($AllMatches as $match){
                $Date = new DateTimeImmutable($match['time']);
                $Month = $Date->format('M');
                $Day = $Date->format('d');
                ?>
                <div class="project-card">
                    <div class="project-image">
                        <img src="<?=$match['picture']; ?>" alt="">
                    </div>
                    <div class="project-info">
                        <div class="project-date">
                            <p><?=$Month; ?><span class="d-block"><?=$Day; ?> </span></p>
                        </div>
                        <div class="project-detai">
                            <h6><?=$match['team1']; ?> vs <?=$match['team2']; ?></h6>
                            <span class="d-block"><b>$ </b><?=$match['price']; ?></span>
                            <span class="d-block"><i class="fa-solid fa-location-dot mx-1"></i><?=$match['stade']; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <section class="projects">
        <div class="all d-flex justify-content-between align-items-center">
            <h3>Upcoming Matchs</h3>
        </div>
        <div class="content">
            <?php foreach($AllMatches as $match){
                $Date = new DateTimeImmutable($match['time']);
                $Month = $Date->format('M');
                $Day = $Date->format('d');
                ?>
                <div class="project-card">
                    <div class="project-image">
                        <img src="<?=$match['picture']; ?>" alt="">
                    </div>
                    <div class="project-info">
                        <div class="project-date">
                            <p><?=$Month; ?><span class="d-block"><?=$Day; ?> </span></p>
                        </div>
                        <div class="project-detai">
                            <h6><?=$match['team1']; ?> vs <?=$match['team2']; ?></h6>
                            <span class="d-block"><b>$ </b><?=$match['price']; ?></span>
                            <span class="d-block"><i class="fa-solid fa-location-dot mx-1"></i><?=$match['stade']; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <section class="projects">
        <div class="all d-flex justify-content-between align-items-center">
            <h3>Upcoming Matchs</h3>
        </div>
        <div class="content">
            <?php foreach($AllMatches as $match){
                $Date = new DateTimeImmutable($match['time']);
                $Month = $Date->format('M');
                $Day = $Date->format('d');
                ?>
                <div class="project-card">
                    <div class="project-image">
                        <img src="<?=$match['picture']; ?>" alt="">
                    </div>
                    <div class="project-info">
                        <div class="project-date">
                            <p><?=$Month; ?><span class="d-block"><?=$Day; ?> </span></p>
                        </div>
                        <div class="project-detai">
                            <h6><?=$match['team1']; ?> vs <?=$match['team2']; ?></h6>
                            <span class="d-block"><b>$ </b><?=$match['price']; ?></span>
                            <span class="d-block"><i class="fa-solid fa-location-dot mx-1"></i><?=$match['stade']; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php
include_once "../include/footer.php"
?>