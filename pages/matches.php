<?php
    // Page Title
    $path = 'Stades';
    session_start();

    // Requiring Controllers 
    require_once('../controller/resevationController.php');

   
   
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- Bootstrap Font Icon CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center align-items-lg-start  mt-5 w-100 ">
        <div class="social-media d-flex flex-lg-column gap-3 mb-3 mb-lg-0">
                <p class="d-none d-lg-block">share</p>
                <span class="color-icon"><i class="fa fa-link fs-3"></i> </span>
                <span class="color-icon"><i class="fab fa-instagram fs-3"></i></span>
                <span class="color-icon"><i class="fab fa-twitter fs-3"></i></span>
                <span class="color-icon"><i class="fab fa-facebook-f fs-3"></i></span>
        </div>
        <div class="container">
            <div class="back w-100 h-100 px-4 d-flex justify-content-center align-items-center">
                <img src="../assets/img/essential/canadavsmaroc.jpg" class="img-thumbnail" alt="" srcset="" id="img">
            </div>

        <div class="d-flex flex-column flex-lg-row justify-content-between mt-5">
            <div class="d-flex flex-column">
                <div class="fw-bold">Morrocco vs Canada</div>
                <!-- <a href="#!" class="text-dark d-flex pt-2"><i class="fas fa-map-marker-alt">Morocco</i></a> -->
                <span class="fas fa-map-marker-alt py-4"> &nbsp; Morocco</span>
                <span class="fa fa-calendar pb-4"> &nbsp; December 01,2022 20.00</span>
                <p class="pt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, expediure voluptate.</p>
    
            </div>
            
            <div class=""> 
                    <div class="card ">
                        <form action="../controller/resevationController.php" method="POST">
                      <div class="card-body">
                        <h5 class="card-title">Tickets starting at</h5>
                        <p class="card-text">$.250</p>
                        <button class="btn" name="reserve">Reserve your e-tickets</button>
                      </div>
                      </form>
                    </div>
            </div>
    
        </div>
    
        <div class="d-flex flex-column my-5">
            <div class="fw-bold py-2">Match Information</div>
            <div class="fw-bold py-2">Description</div>
            <p class="pt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, necessitatibus? In consectetur expedita itaque? Nostrum, vero iusto? Cum quidem molestiae hic, ex consectetur ut sint illo explicabo laboriosam quod. Quibusdam?</p>
        
           
            <select class="form-select my-5 " aria-label="Default select example">
                <option selected>Terms and Condition</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
        </div>

    </div>
    </div>

</body>
</html>
