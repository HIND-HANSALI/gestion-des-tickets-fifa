<?php
    session_start();
    require_once dirname(__DIR__) . '/controller/userController.php';

    $signupController = new UsersController();
    $signupController->UpdateUsers();

    $title = "Profile";

    include_once dirname(__DIR__) . "/include/header.php";

    $nameEditProfile = $_SESSION["name"];
    $emailEditProfile = $_SESSION["email"];
    $idUser = $_SESSION["id"];

    if(isset($_GET["error"])) {

        $nameEditProfile = $_SESSION["name"];
        $emailEditProfile = $_SESSION["email"];
        $passwordEditProfile = $_SESSION["password"];
        $RepeatpasswordEditProfile = $_SESSION["Rpassword"];

        if ($_GET["error"] == "emptyinput") {

            $error = "Veuillez remplir les champs ci-dessous.";
        }

        if ($_GET["error"] == "emailtaken") {
            $error = "Cette adresse e-mail est déjà utilisée.";
        }
        if ($_GET["error"] == "Matchpassword") {
            $error = "les mots de passe ne correspondent pas.";
        }
    }
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

                    <div class="validation-input-signup" <?php if(isset($_GET["error"])){ ?> style="display: flex;" <?php }?>>
                        <div>
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </div>
                        <div class="message-content">
                            <h4>Nous n'avons pas pu vous connecter</h4>
                            <p><?php echo $error; ?></p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <!-- This Input Allows Storing Task Index  -->
                        <input type="hidden" name="id" value="<?php echo $idUser??''?>" id="user-id">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" value="<?php echo $nameEditProfile??''?>" class="form-control" name="nameEdit" id="user_name" oninput="checkNameUpdate()"/>
                        </div>

                        <div class="Error errorName">
                            <P>Enter a valid name</P>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" value="<?php echo $emailEditProfile??''?>" class="form-control" name="emailEdit" id="user_email" oninput="checkEmailUpdate()"/>
                        </div>

                        <div class="Error errorEmail">
                            <P>Enter a valid email address</P>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">password</label>
                            <input type="password" value="<?php echo $passwordEditProfile??''?>" class="form-control" name="passwordEdit" id="user_password"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">confirm password</label>
                            <input type="password" value="<?php echo $RepeatpasswordEditProfile??''?>" class="form-control" name="RpasswordEdit" id="user_Rpassword" oninput="checkMatchPasswordUpdate()"/>
                        </div>

                        <div class="Error errorRPassword">
                            <P>password don't match</P>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button  type="button" name="update" class="btn btn-primary task-action-btn" id="update"  onclick="valideUpdate()">Update</button>
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
    <script src="../assets/js/authentificationScript.js"></script>
        </body>
    </html>
