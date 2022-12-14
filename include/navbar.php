<nav class="navbar navbar-expand-lg px-6 " id="navPrint">
    <div class="container-fluid nav-logo">
        <img src="../assets/img/World-Cup-logo-landscape-on-dark.webp" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="allmatches.php">Matches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="allteams.php">Teams</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="allstades.php">Stades</a>
                </li>
            </ul>
            <?php if(isset($_SESSION["good"])) {?>
            <div class="profile d-flex justify-content-center align-items-center">
                <div class="profile-photo">
                    <img src="../assets/img/essential/user1.png">
                </div>
                <div class="info">
                    <h5><?php echo $_SESSION["name"];?></h5>
                </div>
                <div class="links">
                    <ul>
                        <li><a href="../pages/profile.php"><i class="fa-solid fa-user me-4"></i>Profil</a></li>
                        <?php if($_SESSION["role"]===1){ ?>
                            <li><a href="../admin/index.php"><i class="fa-solid fa-clipboard-list me-4"></i>Dashboard</a></li>
                        <?php }?>
                        <li><a href="../include/signout.php"><i class="fa-solid fa-right-from-bracket me-4"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            <?php }else{ ?>
            <div class="authentification d-flex justify-content-center">
                <a href="login.php"><button class="btn Log-in">Log in</button></a>
                <a href="signup.php"><button class="btn sing-up">Sign Up</button></a>
            </div>
            <?php } ?>
        </div>
    </div>
</nav>