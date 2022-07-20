<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" pattern="[A-Za-z]{3,10}" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-nature"></i></label>
                                <input type="text" class=" has-validation" name="address" id="address" placeholder="Your Address" pattern="[A-Za-z/s]{3,24}" required />
                            </div>

                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="phone" class=" has-validation" name="phone" id="phone" placeholder="Your Phone" pattern="[0-9]{10}" required />
                            </div>
                            <div class="form-group">
                                <label for="dob"><i class="zmdi zmdi-border-color"></i></label>
                                <input type="date" class=" has-validation" name="dob" id="dob" placeholder="Your Date of Birth" required />
                            </div>
                            <div class="form-group">
                                <label for="dob"><i class="zmdi zmdi-assignment-check"></i></label>
                                <input type="file" class=" has-validation" name="aadhar" id="aadhar" onchange="Checkfilesdept();" placeholder="Upload Aadhaar card" required />
                            </div>
                            <script>
                                function Checkfilesdept() {
                                    var fup = document.getElementById('aadhar');
                                    var fileName = fup.value;
                                    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
                                    if (ext == "pdf") {
                                        return true;
                                    } else {

                                        document.getElementById("aadhar").value = "";
                                        fup.focus();
                                        return false;
                                    }
                                }
                            </script>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account"></i></label>
                                <input type="text" class=" has-validation" name="uname" id="username" placeholder="Your username" pattern="[A-Za-z0-9]{4}" required />
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account"></i></label>
                                <input type="text" class=" has-validation" name="desig" id="desig" placeholder="Your Designation" pattern="[A-Za-z]{3,20}" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/13027.jpg" alt="sing up image"></figure>
                        <a href="login.php
                        " class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if (isset($_POST['signup'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $username = $_POST['uname'];
            $password = $_POST['pass'];
            $filename1 = $_FILES["aadhar"]["name"];
            $tempname1 = $_FILES["aadhar"]["tmp_name"];
            $folder1 = "images/" . $filename1;
            $desig = $_POST['desig'];
            $un = mysqli_query($con, "select username from tbl_login where username='$username'");
            if (mysqli_num_rows($un) <= 0) {
                if (mysqli_query($con, "insert into tbl_login(username,password,status,usertype_id) values('$username','$password','0','3')")) {
                    $log = $con->insert_id;
                    mysqli_query($con, "insert into tbl_hosteller(host_name,host_email,host_address,host_phone,host_dob,login_id,aadhar,designation) values('$name','$email','$address','$phone','$dob','$log','$filename1','$desig')");
                    move_uploaded_file($tempname1, $folder1);
                    if (headers_sent()) {
                        die('<script type="text/javascript">window.location.href="login.php?e=1"</script>');
                    } else {
                        header("location:login.php?e=1");
                        die();
                    }
                }
            } else {
        ?>
                <script>
                    alert("username already exist ");
                </script>
        <?php
            }
        }
        ?>
        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>