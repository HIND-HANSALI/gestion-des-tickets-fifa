<?php
    session_start();
    $title = "FifaWorldCup";
    include_once dirname(__DIR__) . "/include/header.php";

    // include Controllers
    include_once('../controller/matchController.php');

    // instantiate the controller
    $MatchController = new MatchController();

    // get matches

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchbtn'])){
            $AllMatches = $MatchController -> searchMatch();
        }else{
            $AllMatches = $MatchController -> getMatches();
        }

// var_dump()($AllMatches);
// die;


?>
    <body style=" background-color: #E1E1E1; overflow-x: hidden;">
<?php
include_once dirname(__DIR__) . "/include/navbar.php"
?>
    <section class="projects">
        <div class="all  d-flex justify-content-between align-items-center">
            <h3 class="">Upcoming Matchs</h3>
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
            <?php foreach($AllMatches as $match){
                $Date = new DateTimeImmutable($match['time']);
                $Month = $Date->format('M');
                $Day = $Date->format('d');
                ?>
                <a href="singlematch.php?idM=<?= $match['id_match'];?>" class="text-decoration-none text-black project-card ">
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