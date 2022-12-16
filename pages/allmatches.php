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

// var_dump()($AllMatches);
// die;


?>
    <body style=" background-color: #E1E1E1; overflow-x: hidden;">
<?php
include_once dirname(__DIR__) . "/include/navbar.php"
?>
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
                <a href="singlematch.php?idM=<?= $match['id_match'];?>" class="text-decoration-none project-card">
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
                </a>
            <?php } ?>
        </div>
    </section>
    <script src="../assets/js/dash/app.js"></script>
<?php
include_once "../include/footer.php"
?>