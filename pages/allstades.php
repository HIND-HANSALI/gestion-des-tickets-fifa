<?php

$title = "FifaWorldCup";
include_once dirname(__DIR__) . "/include/header.php";


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

            <div class="project-card">
                <div class="project-image">
                    <img src="../assets/img/feH6rS1pFNK5DYyn_768x432.jpg" alt="">
                </div>
                <div class="project-detais">
                    <h6>Morocco vs Crotia</h6>
                    <span class="d-block">$150</span>
                    <span class="d-block"><i class="fa-solid fa-location-dot mx-1"></i>Ahmed Bin Ali Stadium</span>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="../assets/img/feH6rS1pFNK5DYyn_768x432.jpg" alt="">
                </div>
                <div class="project-detais">
                    <h6>Morocco vs Crotia</h6>
                    <span class="d-block">$150</span>
                    <span class="d-block"><i class="fa-solid fa-location-dot mx-1"></i>Ahmed Bin Ali Stadium</span>
                </div>
            </div>
        </div>
    </section>
<?php
include_once "../include/footer.php"
?>