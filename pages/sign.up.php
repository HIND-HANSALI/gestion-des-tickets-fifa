<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="../assets/css/all.min.css">

    <!-- ===== Style CSS ===== -->
    <link rel="stylesheet" href="../assets/css/authentificationStyle.css">

    <title>Login & Registration Form</title>
</head>
<body>
<div class="all">
    <div class="container">
        <div class="form signup">
            <span class="title">Registration</span>

            <form action="#">
                <div class="input-field">
                    <input type="text" placeholder="Enter your name" required>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Enter your email" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="password" placeholder="Create a password" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="password" placeholder="Confirm your password" required>
                    <i class="fa-solid fa-lock"></i>
                    <i class="fa-solid fa-eye showHidePw"></i>
                </div>

                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="termCon">
                        <label for="termCon" class="text">I accepted all terms and conditions</label>
                    </div>
                </div>

                <div class="input-field button">
                    <button type="submit" name="signup" id="signup">Sign up</button>
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
<script src="script.js"></script>
</body>
</html>

