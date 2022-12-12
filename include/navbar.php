<nav class="navbar navbar-expand-lg px-6 " id="navPrint">
    <div class="container-fluid nav-logo">
        <img src="../assets/img/World-Cup-logo-landscape-on-dark.webp" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Teams</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="#">Contact</a>
                </li>
            </ul>
            <?php if(isset($_SESSION["good"])) {?>
            <div class="profile d-flex justify-content-center align-items-center">
                <div class="profile-photo">
                    <img src="../assets/img/cropped-DSC_0043.jpg">
                </div>
                <div class="info">
                    <h5><?php echo $_SESSION["Username"];?></h5>
                </div>
                <div class="links">
                    <div class="icon-men">
                        <i class="fa-solid fa-caret-down"></i>
                    </div>
                    <ul>
                        <li><a href="../pages/profile.php">Profile</a></li>
                        <li><a href="../controller/logoutController.php">Logout</a></li>
                    </ul>
                </div>
            </div>
            <?php }else{ ?>
            <div class="authentification d-flex justify-content-center">
                <a href="sign.in.php?id=1"><button class="btn Log-in">Log in</button></a>
                <a href="sign.up.php?id=1"><button class="btn sing-up">Sing Up</button></a>
            </div>
            <?php } ?>
        </div>
    </div>
</nav>