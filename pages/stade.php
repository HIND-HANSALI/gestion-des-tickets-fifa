<?php
    session_start();
    $title = "Stades";
    include_once dirname(__DIR__) . "/include/header.php"
?>
<body style=" background-color: #E1E1E1; overflow-x: hidden;">
    <?php
        include_once dirname(__DIR__) . "/include/navbar.php"
    ?>

     <div class=" position-relative header-stades">
        <div class="opa"></div>
        <!-- <img src="img/header.wedp" alt=""> -->
        <div class="container position-absolute top-50 ">
       <span class="text-white fs-5 fw-bold font-Roboto ">GO  /  Moyen-Orient  /  Qatar</span> 

        <h1 class="text-white fs-1 fw-bold font-Roboto">Guide des stades qatariens pour la Coupe du monde 2022</h1>
        <h3 class="text-white fs-4 fw-bold font-Roboto">Découvrez les stades avant le coup d’envoi !</h3>
        </div> 
     </div>
     <div class="container">
        <div class="pt-4 fw-bold font-Roboto">
        Un incroyable défi de construction est actuellement en cours au Qatar ; la nation tout entière se prépare en effet à accueillir la Coupe du monde de la FIFA 2022. C’est au total pas moins de 7 nouveaux stades qui seront construits pour l’occasion, sans compter les rénovations importantes d’une première arène. Les 8 sites seront répartis à travers tout le pays, à moins d’une heure de la capitale.
        </div>
        <div class=" pt-4   fw-bold font-Roboto">
        À noter que chaque stade sera équipé d’une technologie de climatisation pour lutter contre la chaleur étouffante de l’été qatarien, qui peut facilement dépasser 40 °C. Le pays vit ainsi une véritable course contre la montre, suivie de très près par les fans de football du monde entier, pour se préparer à accueillir cet événement mondial.
        </div>
        <div class="w-100 pt-4 d-flex justify-content-center">
            <div class="card w-100 " >
                <div class="pb-4">
                <img src="../assets/img/essential/stade1.webp" class="card-img-top"  style="height: 30rem;" alt="stade 1">
                </div>
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h5 class="card-title">1 - Khalifa International Stadium</h5>
                    <p class="card-text">Seul stade du pays qui existait avant l’attribution de la Coupe du monde de football au Qatar, le Khalifa International Stadium est l’arène la plus emblématique du pays. Construit en 1976, il pourrait presque être considéré comme archaïque comparé au reste de l’architecture locale. Au terme d’importants travaux de rénovation, il a rouvert ses portes en 2017. Ses 40 000 places accueilleront des matchs jusqu’au quart de finale. Doté de technologies de climatisation avancées garantissant aux joueurs et au public une température idéale, le stade affiche également sa nouvelle modernité dans sa structure externe, reconnaissable à ses deux arches.

                    Le Khalifa International Stadium se trouve au cœur de l’Aspire Zone de Doha, un espace de développement technologique et d’innovation qui devrait servir de principal centre des supporters tout au long de la Coupe du monde 2022.</p>

                    <p> <strong> Emplacement :</strong> Al Waab St, Doha, Qatar </p> 
                    <p><strong> Téléphone :</strong>  +974 6685 4611</p>
                    <a href="#" class="btn">Go somewhere</a>
                </div>
            </div>
        </div>
        
     </div>


     <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      <?php
include_once "../include/footer.php"
?>