<nav class="navbar navbar-light navbar-vertical navbar-expand-lg navbar-vibrant" style="display: none">
    <script>
        var navbarStyle = localStorage.getItem('navbarStyle');
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center mt-3">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation">
                <span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
            </button>
        </div>
        <a class="navbar-brand" href="../pages/index.php">
            <div class="d-flex align-items-center "><img class="me-2" src="assets/img/" alt="" width="10" /><span class="font-sans-serif" style="color: #8A1538 !important">YouTicket</span></div>
        </a>
    </div>
    <div class="collapse navbar-collapse mt-lg-2 my-xs-1 mt-sm-1" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column my-md-3 mt-md-2" id="navbarVerticalNav">
                <li class="nav-item">
                    <a class="nav-link <?= $path == "Dashboard" ? "active" :""; ?>" href="index.php" role="button" >
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon d-flex justify-content-center"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">App</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider">
                        </div>
                    </div>
                    <a class="nav-link <?= $path == "Matches" ? "active" :""; ?>" href="matches.php" role="button">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon d-flex justify-content-center"><span class="fas fa-futbol"></span></span><span class="nav-link-text ps-1">Matches</span>
                        </div>
                    </a>
                    <a class="nav-link <?= $path == "Teams" ? "active" :""; ?>" href="teams.php" role="button">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon d-flex justify-content-center"><span class="fas fa-users"></span></span><span class="nav-link-text ps-1">Teams</span>
                        </div>
                    </a>
                    <a class="nav-link <?= $path == "Stades" ? "active" :""; ?>" href="stades.php" role="button" style="margin-left: -0.005rem !important ;">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon d-flex justify-content-center"><img width="20rem" src="../assets/img/essential/stadium5.png" alt=""/></span><span class="nav-link-text ps-1">Stades</span>
                        </div>
                    </a>
                    <a class="nav-link <?= $path == "Users" ? "active" :""; ?>" href="users.php" role="button">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon d-flex justify-content-center"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Users</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg" style="display: none"></nav>