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
        <div class="form login">
            <span class="title">Login</span>

            <form action="script.php" method="POST" id="form-task">
                <div class="input-field">
                    <input type="email" name="email" placeholder="Enter your email"  onInput="check(2)" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="input-field">
                    <input type="password" name="password" class="password" placeholder="Enter your password"   required>
                    <i class="fa-solid fa-lock"></i>
                    <i class="fa-solid fa-eye showHidePw"></i>
                </div>

                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="logCheck">
                        <label for="logCheck" class="text">Remember me</label>
                    </div>

                    <a href="#" class="text">Forgot password?</a>
                </div>

                <div class="input-field button">
                    <button type="submit" name="login" id="login">Login</button>
                </div>
            </form>

            <div class="login-signup">
                        <span class="text">Not a member?
                            <a href="sign_up.html" class="text signup-link">Signup Now</a>
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

