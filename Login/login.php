<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
</head>

<body>
    <?php
    if (isset($_GET['le'])) {
    ?>
        <script>
            swal("Oops!", "Invalid Username Or Password!", "error");
        </script>
    <?php
    }
    ?>
    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/19197690.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form" action="login.php">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="uname" id="your_name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php


if (isset($_POST['signin'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $re = mysqli_query($con, "select * from tbl_login where username='$username' and password='$password' and status='1'");
    $lo = mysqli_fetch_assoc($re);
    if (mysqli_num_rows($re) > 0) {
        if ($lo['usertype_id'] == 1) {
            $_SESSION['admin'] = $lo['login_id'];
            header("location:../Admin/index.php");
        } else if ($lo['usertype_id'] == 2) {
            $_SESSION['warden'] = $lo['login_id'];
            header("location:../Warden/index.php");
        } else if ($lo['usertype_id'] == 3) {
            $_SESSION['hosteller'] = $lo['login_id'];
            header("location:../Hosteller/index.php");
        } else if ($lo['usertype_id'] == 4) {
            $_SESSION['staff'] = $lo['login_id'];
            header("location:../Staff/index.php");
        } else {
            $_SESSION['parent'] = $lo['login_id'];
            header("location:../Parent/index.php");
        }
    } else {

        header("location:login.php?le=1");
    }
}
