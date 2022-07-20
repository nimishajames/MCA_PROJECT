<?php
session_start();
include('connection.php');
if ($_SESSION['admin']) {


?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Hello</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>

   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">

                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/admin.png" alt="#" /></div>
                        <div class="user_info">
                           <h6>Hostel Admin</h6>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4></h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="index.php" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>

                     </li>
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Users</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="warden.php"> <span>Add users</span></a></li>
                           <li><a href="staff.php"> <span>Add Staff</span></a></li>
                           <li><a href="viewhost.php"> <span>view hostellers</span></a></li>


                        </ul>
                     </li>

                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Manage Rooms</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="room.php"> <span>Add Rooms</span></a></li>
                           <li><a href="status.php"> <span>Status</span></a></li>
                           <li><a href="catroom.php"> <span>Add category</span></a></li>

                        </ul>
                     </li>


                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Complaints</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="managecom.php"> <span>View complaint</span></a>
                           </li>
                           <li><a href="staffcomplaint.php"> <span>view staff complaints</span></a></li>

                        </ul>
                     </li>
                     <li>
                        <a href="messview.php" data-toggle="" aria-expanded="false" class=""><i class="fa fa-object-group blue2_color"></i> <span>Mess</span></a>

                     </li>
                     <li>
                        <a href="fees.php" data-toggle="" aria-expanded="false" class=""><i class="fa fa-object-group blue2_color"></i> <span>Fees</span></a>
                     </li>
                     <li>
                        <a href="viewarden.php" data-toggle="" aria-expanded="false" class=""><i class="fa fa-object-group blue2_color"></i> <span>Warden</span></a>
                     </li>
                     <li>
                        <a href="viewhosteller.php" data-toggle="" aria-expanded="false" class=""><i class="fa fa-object-group blue2_color"></i> <span>Hosteller</span></a>
                     </li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>

                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge"></span></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge"></span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/admin.png" alt="#" /><span class="name_user">Admin</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="settings.html">Settings</a>
                                       <a class="dropdown-item" href="logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h4><b>Add Warden</b></h4>
                              <div class="card">
                                 <form name="myform" method="POST" action="warden.php" enctype="multipart/form-data" class="col-8 was-validated">
                                    <div class="form-group">
                                       <label for="uname">Name:</label>
                                       <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" pattern="[A-Za-z\s]{1,20}" required>
                                       <div class="valid-feedback">Valid.</div>
                                       <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="form-group">
                                       <label for="uname">Address:</label>
                                       <textarea type="text" class="form-control" id="address" placeholder="Enter Address" name="address" pattern="[A-Za-z\s]{1,20}" required></textarea>
                                       <div class="valid-feedback">Valid.</div>
                                       <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="form-group">
                                       <label for="uname">Phone:</label>
                                       <input type="number" class="form-control" id="phone" placeholder="Enter Phone" name="phone" pattern="[1-9]{10}" required>
                                       <div class="valid-feedback">Valid.</div>
                                       <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="form-group">
                                       <label for="uname">Date of Birth</label>
                                       <input type="date" class="form-control" id="dob" placeholder="Enter dob" name="dob" required>
                                       <div class="valid-feedback">Valid.</div>
                                       <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="form-group">
                                       <label for="uname">email</label>
                                       <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                                       <div class="valid-feedback">Valid.</div>
                                       <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="form-group">
                                       <label for="uname">Username</label>
                                       <input type="text" class="form-control" id="username" placeholder=" Enter username" name="uname" required>
                                       <div class="valid-feedback">Valid.</div>
                                       <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="form-group">
                                       <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="file" onchange="return fileValidation()" name="image" required>
                                          <label class="custom-file-label" for="validatedCustomFile">Upload photo</label>
                                          <div class="valid-feedback">Valid.</div>
                                          <div class="invalid-feedback"> invalid file </div>
                                       </div>
                                       <div id="output" style="color:red"></div>
                                    </div><br>

                                    <button type="submit" name="button" class="btn btn-primary">Submit</button>
                              </div>


                              </form>
                              <script>
                                 function fileValidation() {
                                    var fileInput = document.getElementById('file');
                                    var filePath = fileInput.value;
                                    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                                    if (!allowedExtensions.exec(filePath)) {
                                       alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
                                       fileInput.value = '';
                                       return false;
                                    } else {
                                       //Image preview
                                       if (fileInput.files && fileInput.files[0]) {
                                          var reader = new FileReader();
                                          reader.onload = function(e) {
                                             document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '"/>';
                                          };
                                          reader.readAsDataURL(fileInput.files[0]);
                                       }
                                    }
                                 }
                              </script>



                           </div>
                        </div>
                     </div>
                  </div>


                  <!-- footer -->


                  <!-- end dashboard inner -->
               </div>
            </div>
         </div>
         <!-- jQuery -->
         <script src="js/jquery.min.js"></script>
         <script src="js/popper.min.js"></script>
         <script src="js/bootstrap.min.js"></script>
         <!-- wow animation -->
         <script src="js/animate.js"></script>
         <!-- select country -->
         <script src="js/bootstrap-select.js"></script>
         <!-- owl carousel -->
         <script src="js/owl.carousel.js"></script>
         <!-- chart js -->
         <script src="js/Chart.min.js"></script>
         <script src="js/Chart.bundle.min.js"></script>
         <script src="js/utils.js"></script>
         <script src="js/analyser.js"></script>
         <!-- nice scrollbar -->
         <script src="js/perfect-scrollbar.min.js"></script>
         <script>
            var ps = new PerfectScrollbar('#sidebar');
         </script>
         <!-- custom js -->
         <script src="js/custom.js"></script>
         <script src="js/chart_custom_style1.js"></script>
   </body>

   </html>
   <?php
   if (isset($_POST['button'])) {
      $name = $_POST['name'];
      $address = $_POST['address'];
      $phone = $_POST['phone'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $username = $_POST['uname'];
      $password = $username . '999';
      $filename = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];
      $folder = "images/" . $filename;
      $wr = mysqli_query($con, "select * from tbl_login where username='$username'");
      if (mysqli_num_rows($wr) <= 0) {
         if (mysqli_query($con, "insert into tbl_login(username,password,status,usertype_id)values('$username','$password','1','2')")) {
            $lg = $con->insert_id;
            if (mysqli_query($con, "insert into tbl_warden(w_name,w_address,w_phone,w_dob,w_email,w_pic,login_id)values('$name','$address','$phone','$dob','$email','$filename','$lg')")) {
               move_uploaded_file($tempname, $folder);
            }
         } else {
   ?>
            <script>
               alert("erorr!");
            </script>

         <?php
         }
      } else {
         ?>
         <script>
            alert("username exist");
         </script>
<?php

      }
   }
} else {
   if (headers_sent()) {
      die('<script type="text/javascript">window.location.href="../Login/login.php?e=1"</script>');
   } else {
      header('location:../Login/login.php');
      die();
   }
}
?>