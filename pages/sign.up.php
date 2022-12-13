<?php

require_once dirname(__DIR__) . '/controller/userController.php';

$signupController = new UsersController();
$signupController->signupUser();

$error="Veuillez remplir les champs ci-dessous.";


if(isset($_GET["error"])){

    $nameSignup = $_SESSION["name"];
    $emailSignup = $_SESSION["email"];
    $passwordSignup = $_SESSION["password"];
    $Repeatpassword = $_SESSION["Rpassword"];

    if ($_GET["error"]=="emptyinput"){

        $error="Veuillez remplir les champs ci-dessous.";
    }

    if ($_GET["error"]=="emailtaken"){
        $error="Cette adresse e-mail est déjà utilisée.";
    }
    if ($_GET["error"]=="Matchpassword"){
        $error="les mots de passe ne correspondent pas.";
    }
}

$title = "Sign_Up";
include_once dirname(__DIR__) . "/include/header.php"
?>
<body>
<?php
include_once dirname(__DIR__) . "/include/navbar.php"
?>
<div class="all-authotification">
    <div class="container">
        <div class="form signup">
            <span class="title">Registration</span>

            <div class="validation-input-signup" <?php if(isset($_GET["error"])){ ?> style="display: flex;" <?php }?>>
                <div>
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>
                <div class="message-content">
                    <h4>Nous n'avons pas pu vous connecter</h4>
                    <p><?php echo $error; ?></p>
                </div>
            </div>

            <form method="POST">
                <div class="input-field">
                    <input type="text" value="<?php echo $nameSignup??''?>" name="nameSignup" class="nameSignup" placeholder="Enter your name" oninput="checkName()">
                    <i class="fa-solid fa-user"></i>
                </div>

                <div class="Error errorName">
                    <P>Enter a valid name</P>
                </div>

                <div class="input-field">
                    <input type="email" value="<?php echo $emailSignup??''?>" name="emailSignup" class="emailSignup" placeholder="Enter your email" oninput="checkEmailSignup()">
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="Error errorEmail">
                    <P>Enter a valid email address</P>
                </div>

                <div class="input-field">
                    <input type="password" value="<?php echo $passwordSignup??''?>" name="passwordSignup" class="passwordSignup" placeholder="Enter your password" oninput="checkPasswordSignup()">
                    <i class="fa-solid fa-lock"></i>
                </div>

                <div class="Error errorPassword">
                    <P>Enter a valid password that character greater than 8</P>
                </div>

                <div class="input-field">
                    <input type="password" value="<?php echo $Repeatpassword??''?>" name="Repeatpassword" class="PasswordRPassword" placeholder="Enter your password" oninput="checkMatchPassword()">
                    <i class="fa-solid fa-lock lockRepeatpassword"></i>
                    <i class="fa-solid fa-eye showHidePw"></i>
                </div>

                <div class="Error errorRPassword">
                    <P>password don't match</P>
                </div>

                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="termCon">
                        <label for="termCon" class="text">I accepted all terms and conditions</label>
                    </div>
                </div>

                <div class="input-field button">
                    <button type="button" name="signup" id="signup" onclick="valideSignup()">Sign up</button>
                </div>
            </form>

            <div class="login-signup">
                <span class="text">Already a member?
                    <a href="sign.in.php" class="text login-link">Login Now</a>
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

