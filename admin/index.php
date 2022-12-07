<?php
    $path = 'Dashboard';

    // include Controllers
    include_once('../controller/matchController.php');

    // instantiate the controller
    $matchController = new MatchController();

    // get matches
    $FourMatches = $matchController -> FourMatches();
?>

<!DOCTYPE html>
<html lang="en-US" class="dark">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <?php include('../include/dashboard/head.php'); ?>
    </head>
    <body>
        <main class="main" id="top">
            <div class="container-fluid" data-layout="container">
                <?php include('../include/dashboard/nav-mobile.php'); ?>
                <div class="content">
                    <?php include('../include/dashboard/nav-desk.php'); ?>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6 col-xxl-3">
                            <div class="card h-md-100 ecommerce-card-min-width">
                                <div class="card-header pb-0">
                                    <h6 class="mb-0 mt-2 d-flex align-items-center">
                                        Weekly Sales<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales"
                                            ><span class="far fa-question-circle" data-fa-transform="shrink-1"></span
                                        ></span>
                                    </h6>
                                </div>
                                <div class="card-body d-flex flex-column justify-content-end">
                                    <div class="row">
                                        <div class="col">
                                            <p class="font-sans-serif lh-1 mb-1 fs-4">$47K</p>
                                            <span class="badge badge-soft-success rounded-pill fs--2">+3.5%</span>
                                        </div>
                                        <div class="col-auto ps-0">
                                            <div class="echart-bar-weekly-sales h-100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-3">
                            <div class="card h-md-100">
                                <div class="card-header pb-0">
                                    <h6 class="mb-0 mt-2">Total Order</h6>
                                </div>
                                <div class="card-body d-flex flex-column justify-content-end">
                                    <div class="row justify-content-between">
                                        <div class="col-auto align-self-end">
                                            <div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1">58.4K</div>
                                            <span class="badge rounded-pill fs--2 bg-200 text-primary"><span class="fas fa-caret-up me-1"></span>13.6%</span>
                                        </div>
                                        <div class="col-auto ps-0 mt-n4">
                                            <div
                                                class="echart-default-total-order"
                                                data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","Week 6","Week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}'
                                                data-echart-responsive="true"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-3">
                            <div class="card h-md-100">
                                <div class="card-body">
                                    <div class="row h-100 justify-content-between g-0">
                                        <div class="col-5 col-sm-6 col-xxl pe-2">
                                            <h6 class="mt-1">Market Share</h6>
                                            <div class="fs--2 mt-3">
                                                <div class="d-flex flex-between-center mb-1">
                                                    <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">Samsung</span></div>
                                                    <div class="d-xxl-none">33%</div>
                                                </div>
                                                <div class="d-flex flex-between-center mb-1">
                                                    <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">Huawei</span></div>
                                                    <div class="d-xxl-none">29%</div>
                                                </div>
                                                <div class="d-flex flex-between-center mb-1">
                                                    <div class="d-flex align-items-center"><span class="dot bg-300"></span><span class="fw-semi-bold">Apple</span></div>
                                                    <div class="d-xxl-none">20%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto position-relative">
                                            <div class="echart-market-share"></div>
                                            <div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">26M</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-3">
                            <div class="card h-md-100">
                                <div class="card-header d-flex flex-between-center pb-0">
                                    <h6 class="mb-0">Weather</h6>
                                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                                        <button
                                            class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                            type="button"
                                            id="dropdown-weather-update"
                                            data-bs-toggle="dropdown"
                                            data-boundary="viewport"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            <span class="fas fa-ellipsis-h fs--2"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-weather-update">
                                            <a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#!">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-2">
                                    <div class="row g-0 h-100 align-items-center">
                                        <div class="col">
                                            <div class="d-flex align-items-center">
                                                <img class="me-3" src="assets/img/icons/weather-icon.png" alt="" height="60" />
                                                <div>
                                                    <h6 class="mb-2">New York City</h6>
                                                    <div class="fs--2 fw-semi-bold">
                                                        <div class="text-warning">Sunny</div>
                                                        Precipitation: 50%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto text-center ps-2">
                                            <div class="fs-4 fw-normal font-sans-serif text-primary mb-1 lh-1">31&deg;</div>
                                            <div class="fs--1 text-800">32&deg; / 25&deg;</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-lg-6 pe-lg-2 mb-3">
                            
                        </div>
                        <div class="col-lg-6 ps-lg-2 mb-3">
                            
                        </div>
                        <div class="card mb-3">
                            <div class="card-header border-bottom">
                                <div class="row flex-between-end">
                                    <div class="col-auto align-self-center">
                                        <h5 class="mb-0" data-anchor="data-anchor">Latest Matches</h5>
                                        <p class="mb-0 pt-1 mt-2 mb-0">
                                            Preview of the last 4 match added to the system.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="tab-content">
                                    <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-f3ee3586-6986-435d-af14-04f95ce3db36" id="dom-f3ee3586-6986-435d-af14-04f95ce3db36">
                                        <div class="table-responsive scrollbar">
                                            <table class="table table-hover table-striped overflow-hidden">
                                               <thead>
                                                    <tr>
                                                        <th scope="col">Picture</th>
                                                        <th scope="col">Team 1</th>
                                                        <th scope="col">Team 2</th>
                                                        <th scope="col">Stade</th>
                                                        <th scope="col">Date & Time</th>
                                                        <th class="text-center" scope="col">Status</th>
                                                        <th class="text-end" scope="col">Price USD($)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($FourMatches AS $match){ ?>
                                                        <tr class="align-middle">
                                                            <td class="text-nowrap">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-xl">
                                                                        <img class="rounded-circle" src="<?=$match['picture']; ?>" alt="" />
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap"><?=$match['team1']; ?></td>
                                                            <td class="text-nowrap"><?=$match['team2']; ?></td>
                                                            <td class="text-nowrap"><?=$match['stade']; ?></td>
                                                            <td class="text-nowrap"><?=$match['time']; ?></td>
                                                            <td>
                                                                <span class="badge badge rounded-pill d-block p-2 badge-soft-<?= $match['status'] == "Soon" ? "secondary" :( $match['status'] == "In Progress" ? "info": "success" ); ?>"><?= $match['status'];?></span>
                                                            </td>
                                                            <td class="text-end"><?=$match['price']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <footer class="footer">
                        <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-600">
                                    Powered By ... <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" />
                                    2022 &copy; <a href="#"></a>
                                </p>
                            </div>
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-600">AK</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </main>
        <!-- ===============================================-->
        <!--    End of Main Content-->
        <!-- ===============================================-->

        <!-- <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
            <div class="offcanvas-header settings-panel-header bg-shape">
                <div class="z-index-1 py-1 light">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h5 class="text-white mb-0 me-2"><span class="fas fa-palette me-2 fs-0"></span>Settings</h5>
                        <button class="btn btn-primary btn-sm rounded-pill mt-0 mb-0" data-theme-control="reset" style="font-size: 12px"><span class="fas fa-redo-alt me-1" data-fa-transform="shrink-3"></span>Reset</button>
                    </div>
                    <p class="mb-0 fs--1 text-white opacity-75">Set your own customized style</p>
                </div>
                <button class="btn-close btn-close-white z-index-1 mt-0" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body scrollbar-overlay px-card h-100" id="themeController">
                <h5 class="fs-0">Color Scheme</h5>
                <p class="fs--1">Choose the perfect color mode for your app.</p>
                <div class="btn-group d-block w-100 btn-group-navbar-style">
                    <div class="row gx-2">
                        <div class="col-6">
                            <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="theme" /><label
                                class="btn d-inline-block btn-navbar-style fs--1"
                                for="themeSwitcherLight">
                                <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="assets/img/generic/-mode-default.jpg" alt="" /></span
                                ><span class="label-text">Light</span></label
                            >
                        </div>
                        <div class="col-6">
                            <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="theme" /><label
                                class="btn d-inline-block btn-navbar-style fs--1"
                                for="themeSwitcherDark">
                                <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="assets/img/generic/-mode-dark.jpg" alt="" /></span><span class="label-text"> Dark</span></label
                            >
                        </div>
                    </div>
                </div>
                <hr />
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-start">
                        <img class="me-2" src="assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
                        <div class="flex-1">
                            <h5 class="fs-0">RTL Mode</h5>
                            <p class="fs--1 mb-0">Switch your language direction</p>
                            <a class="fs--1" href="documentation/customization/configuration.html">RTL Documentation</a>
                        </div>
                    </div>
                    <div class="form-check form-switch"><input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL" /></div>
                </div>
                <hr />
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-start">
                        <img class="me-2" src="assets/img/icons/arrows-h.svg" width="20" alt="" />
                        <div class="flex-1">
                            <h5 class="fs-0">Fluid Layout</h5>
                            <p class="fs--1 mb-0">Toggle container layout system</p>
                            <a class="fs--1" href="documentation/customization/configuration.html">Fluid Documentation</a>
                        </div>
                    </div>
                    <div class="form-check form-switch"><input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" /></div>
                </div>
                <hr />
                <div class="d-flex align-items-start">
                    <img class="me-2" src="assets/img/icons/paragraph.svg" width="20" alt="" />
                    <div class="flex-1">
                        <h5 class="fs-0 d-flex align-items-center">Navigation Position</h5>
                        <p class="fs--1 mb-2">Select a suitable navigation system for your web application</p>
                        <div>
                            <select class="form-select form-select-sm" aria-label="Navbar position" data-theme-control="navbarPosition">
                                <option value="vertical">Vertical</option>
                                <option value="top">Top</option>
                                <option value="combo">Combo</option>
                                <option value="double-top">Double Top</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr />
                <h5 class="fs-0 d-flex align-items-center">Vertical Navbar Style</h5>
                <p class="fs--1 mb-0">Switch between styles for your vertical navbar</p>
                <p><a class="fs--1" href="modules/components/navs-and-tabs/vertical-navbar.html#navbar-styles">See Documentation</a></p>
                <div class="btn-group d-block w-100 btn-group-navbar-style">
                    <div class="row gx-2">
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle" value="transparent" data-theme-control="navbarStyle" /><label
                                class="btn d-block w-100 btn-navbar-style fs--1"
                                for="navbar-style-transparent">
                                <img class="img-fluid img-prototype" src="assets/img/generic/default.png" alt="" /><span class="label-text"> Transparent</span></label
                            >
                        </div>
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle" value="inverted" data-theme-control="navbarStyle" /><label
                                class="btn d-block w-100 btn-navbar-style fs--1"
                                for="navbar-style-inverted">
                                <img class="img-fluid img-prototype" src="assets/img/generic/inverted.png" alt="" /><span class="label-text"> Inverted</span></label
                            >
                        </div>
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card" data-theme-control="navbarStyle" /><label
                                class="btn d-block w-100 btn-navbar-style fs--1"
                                for="navbar-style-card">
                                <img class="img-fluid img-prototype" src="assets/img/generic/card.png" alt="" /><span class="label-text"> Card</span></label
                            >
                        </div>
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle" value="vibrant" data-theme-control="navbarStyle" /><label
                                class="btn d-block w-100 btn-navbar-style fs--1"
                                for="navbar-style-vibrant">
                                <img class="img-fluid img-prototype" src="assets/img/generic/vibrant.png" alt="" /><span class="label-text"> Vibrant</span></label
                            >
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <img class="mb-4" src="assets/img/icons/spot-illustrations/47.png" alt="" width="120" />
                    <h5>Like What You See?</h5>
                    <p class="fs--1">Get  now and create beautiful dashboards with hundreds of widgets.</p>
                    <a class="mb-3 btn btn-primary" href="https://themes.getbootstrap.com/product/-admin-dashboard-webapp-template/" target="_blank">Purchase</a>
                </div>
            </div>
        </div>
        <a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
            <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
                <div class="bg-soft-primary position-relative rounded-start" style="height: 34px; width: 28px">
                    <div class="settings-popover">
                        <span class="ripple"
                            ><span class="fa-spin position-absolute all-0 d-flex flex-center"
                                ><span class="icon-spin position-absolute all-0 d-flex flex-center"
                                    ><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z"
                                            fill="#2A7BE4"></path></svg></span></span
                        ></span>
                    </div>
                </div>
                <small class="text-uppercase text-primary fw-bold bg-soft-primary py-2 pe-2 ps-1 rounded-end">customize</small>
            </div>
        </a> -->
       <?php include('../include/dashboard/scripts.php'); ?>
    </body>
</html>
