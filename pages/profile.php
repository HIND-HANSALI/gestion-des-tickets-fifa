<?php

    require_once dirname(__DIR__) . '/controller/updateController.php';

    $UpdatContr = new UpdateContr();
    $UpdatContr->UpdateUsers();

    session_start();
    $title = "Profile";

    include_once dirname(__DIR__) . "/include/header.php";

    $nameSignup = $_SESSION["name"];
    $emailSignup = $_SESSION["email"];
?>
    <body style=" background-color: #E1E1E1; overflow-x: hidden;">
<?php
    include_once dirname(__DIR__) . "/include/navbar.php"
?>
    <div class="updateprofile">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" id="form-product" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h1 class="modal-title">Edit Profile</h1>
                    </div>
                    <div class="modal-body">
                        <!-- This Input Allows Storing Task Index  -->
                        <input type="hidden" name="id" value="<?php echo $email??''?>" id="user-id">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" value="<?php echo $nameSignup??''?>" class="form-control" name="nameEdit" id="user_name"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" value="<?php echo $emailSignup??''?>" class="form-control" name="emailEdit" id="user_email"/>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">password</label>
                            <input type="text" class="form-control" name="passwordEdit" id="user_password"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">confirm password</label>
                            <input type="text" class="form-control" name="RpasswordEdit" id="user_Rpassword"/>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button  type="submit" name="update" class="btn btn-primary task-action-btn" id="profile-save-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="tableau-Match">
        <div class="headProfile">
            <h1>Your Matches History</h1>
        </div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name_match</th>
                <th>date_match</th>
                <th>prix_match</th>
                <th>quantite</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>HHJ</td>
                    <td>jjj</td>
                    <td>nnn</td>
                    <td>mmm</td>
                </tr>
            </tbody>
        </table>
    </div>
