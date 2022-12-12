<?php
    // Page Title
    $path = 'Users';
    session_start();

    require_once '../controller/userController.php';

    $Users = new UsersController();

    $AllUsers = $Users -> getUsers(); 
    $Users -> setRole();
    $Users -> deleteUser();
    



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
                        <h1><?=$path; ?> </h1>
                    </div>
                    <div class="row g-0">
                        <div class="card mb-3">
                            <div class="card-header border-bottom">
                                <div class=" d-flex justify-content-between">
                                    <div class="col-auto align-self-center">
                                        <h5 class="mb-0" >All Users</h5>
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
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Full Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Role</th>
                                                        <th class="text-end" scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($AllUsers AS $user){ ?>

                                                        <tr class="align-middle" id="User<?=$user['id_user']; ?>">
                                                            <td class="text-nowrap"><?=$user['id_user']; ?></td>
                                                            <td id="userName<?=$user['id_user']; ?>" class="text-nowrap"><?=$user['fullname']; ?></td>
                                                            <td id="userEmail<?=$user['id_user']; ?>" class="text-nowrap"><?=$user['email']; ?></td>
                                                            <td id="userRole<?=$user['id_user']; ?>" class="text-nowrap">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" name="UserRole<?=$user['id_user']; ?>" id="flexSwitchCheckDefault" onclick="setRole('<?=$user['id_user']; ?>')" 
                                                                    <?php if($user['id_role'] == '1') 
                                                                        echo 'checked';?> > Admin
                                                                </div>
                                                            </td>
                                                            
                                                            <td class="text-center" scope="col">
                                                                <a href="#" onclick="DeleteUser(<?=$user['id_user']; ?>)" class="btn btn-sm btn-danger">Delete</a>
                                                            </td>
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
        
       <?php include('../include/dashboard/scripts.php'); ?>
    </body>
</html>
