<?php

require_once dirname(__DIR__) . '/controller/loginController.php';

$LoginContr = new LoginContr();
$LoginContr->checkUser();

$error="Veuillez remplir les champs ci-dessous.";

if(isset($_GET["error"])=="wronglogin"){
    $email = $_SESSION["email"];
    $password =  $_SESSION["password"];
    $error="l'adresse courriel ou le mot de passe que vous avez saisis sont incorrects. Veuillez réessayer.";
}
$title = "Login";
include_once dirname(__DIR__) . "/include/header.php"
?>

<body>
<?php
include_once dirname(__DIR__) . "/include/navbar.php"
?>
<div class="all-authotification">
    <div class="container">
        <div class="form login">
            <span class="title">Login</span>

            <div class="validation-input-signin" <?php if(isset($_GET["error"])=="wronglogin"){ ?> style="display: flex;" <?php }?>>
                <div>
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>
                <div class="message-content">
                    <h4>Nous n'avons pas pu vous connecter</h4>
                    <p><?php echo $error; ?></p>
                </div>
            </div>

            <form method="POST" id="form-task">
                <div class="input-field">
                    <input type="email" value="<?php echo $email??''?>" name="emailSignin" class="emailSignin" placeholder="Enter your email" oninput="checkEmailSignin()">
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="Error errorEmail">
                    <P>Entrer a valid email address</P>
                </div>

                <div class="input-field">
                    <input type="password" value="<?php echo $password??''?>" name="passwordSignin" class="passwordSignin" placeholder="Enter your password" oninput="checkPasswordSignin()">
                    <i class="fa-solid fa-lock"></i>
                    <i class="fa-solid fa-eye showHidePw"></i>
                </div>

                <div class="Error errorPassword">
                    <P>Entrer a password</P>
                </div>

                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="logCheck">
                        <label for="logCheck" class="text">Remember me</label>
                    </div>

                    <a href="#" class="text">Forgot password?</a>
                </div>

                <div class="input-field button">
                    <button type="button" name="login" id="login" onclick="valideSignin()">Login</button>
                </div>
            </form>

            <div class="login-signup">
                <span class="text">Not a member?
                    <a href="sign.up.php" class="text signup-link">Signup Now</a>
                </span>
            </div>
        </div>
    </div>
    <div class="background-img">
        <img src="../assets/img/185-1859678_fifa-world-cup-qatar-2022-logo-hd-png.png" alt="">
    </div>
</div>

<script src="../assets/js/authentificationScript.js"></script>
</body>
</html>

