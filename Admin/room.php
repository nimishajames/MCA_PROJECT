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
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>

                     </li>

                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Users</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="warden.php"> <span>Add users</span></a></li>
                           <li><a href="staff.php"> <span>Add staff</span></a></li>
                           <li><a href="viewhosteller.php"> <span>view hostellers</span></a></li>

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
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
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
                              <h2>ADD ROOMS</h2>
                           </div>
                        </div>
                     </div>
                     <form method="POST" action="room.php">
                        <?php
                        $r = mysqli_query($con, "select * from tbl_roomtype");
                        ?>
                        <div class="form-group">
                           <label for="exampleInputEmail1">Room Type</label>
                           <select class="form-control" name="roomtype">
                              <?php
                              while ($rm = mysqli_fetch_array($r)) {
                              ?>
                                 <option value="<?php echo $rm['roomtype_id'] ?>"><?php echo $rm['roomtype'] ?></option>
                              <?php
                              }
                              ?>
                           </select>

                           <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Room Number</label>
                           <input type="text" class="form-control" name="roomnumber" id="exampleInputPassword1" placeholder="enter room number">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                     </form>

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
   if (isset($_POST['submit'])) {
      $room = $_POST['roomtype'];
      $roomno = $_POST['roomnumber'];
      if ($room == 1) {


         if (mysqli_query($con, "INSERT INTO tbl_room(room_no,roomtype_id,mem_count) VALUES ('$roomno','$room','1')")) {
            if (headers_sent()) {
               die('<script type="text/javascript">window.location.href="room.php?e=1"</script>');
            } else {
               header('location:room.php');
               die();
            }
         }
      } else if ($room == 2) {
         if (mysqli_query($con, "INSERT INTO tbl_room(room_no,roomtype_id,mem_count) VALUES ('$roomno','$room','2')")) {
            if (headers_sent()) {
               die('<script type="text/javascript">window.location.href="room.php?e=1"</script>');
            } else {
               header('location:room.php');
               die();
            }
         }
      } else {
         if (mysqli_query($con, "INSERT INTO tbl_room(room_no,roomtype_id,mem_count) VALUES ('$roomno','$room','3')")) {
            if (headers_sent()) {
               die('<script type="text/javascript">window.location.href="room.php?e=1"</script>');
            } else {
               header('location:room.php');
               die();
            }
         }
      }
   }
   ?>
<?php
} else {
   if (headers_sent()) {
      die('<script type="text/javascript">window.location.href="../Login/login.php?e=1"</script>');
   } else {
      header('location:../Login/login.php');
      die();
   }
}
?>