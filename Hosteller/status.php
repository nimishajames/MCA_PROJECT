<?php
session_start();
include('connection.php');
if(isset($_SESSION['hosteller'])){
    $id=$_SESSION['hosteller'];



?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/stl.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
          </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/host.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Irin</h5>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="hprofile.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Complaints</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="complaint.php">Add complaints</a></li>
                <li class="nav-item"> <a class="nav-link" href="status.php">Status</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
   
    <div class="container-fluid page-body-wrapper col-12">
            <!-- CONTACT -->
    <section class="contact section-padding"><br>
    <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <?php
    $select = mysqli_query($con, "select * from  tbl_hosteller where Login_id=$id");
    $res = mysqli_fetch_assoc($select);
    ?>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">     
    <div class="col-xl-12">
            <!-- Account details card-->
    <div class="card mb-4">
    <div class="card-header"></div>
    <div class="card-body">
    <div class="col-12" >
      <div class="card" style="padding:25px;border-radius:25px;">
      <?php
    $sl = mysqli_query($con, "select * from  tbl_complaint where host_id='$res[host_id]' ");


    ?>
    <div class="col-12">
      <h3>Registered complaints</h3><br>
      <?php
      while ($ft = mysqli_fetch_array($sl)) {
        $ms = mysqli_query($con, "select * from tbl_comtype where comtype_id=$ft[comtype_id]");
        $mss = mysqli_fetch_assoc($ms);
      ?>
        <div class="row">
          <div class="card col-12" style="padding:50px;border-radius:50px;">
            <h6><b><?php echo $mss['comtype_name']; ?></b></h6>
            <h5><?php echo $ft['complaint']; ?></h5>
            <small><i> <?php echo $ft['date']; ?>
              </i></small>
            <?php
            $reply = mysqli_query($con, "select * from  tbl_complaint c,tbl_replycom r where c.comp_id='$ft[comp_id]' and r.comp_id='$ft[comp_id]' and c.host_id=r.host_id and  r.repcom_id=r.repcom_id");
            $rep = mysqli_fetch_assoc($reply);
            $count = mysqli_num_rows($reply);
            if ($count == 1) {

            ?>
              <div class="card" style="padding:20px;border-radius:25px;"><br>
                <p>Reply</p>
                <h6><?php echo $rep['date']; ?></h6>
                <h5><?php echo $rep['reply']; ?></h5>
              </div>
            <?php
            }
            ?>
          </div>

        </div>
        <br>
      <?php
      }
      ?>
    </div>
    <br>
    </div>
</div>
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="#" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">               
                  <div class="preview-item-content">
                      <a class="btn btn-primary" href="logout.php"> Log out </a>
                    </div> 
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
    </div>
        </nav>
        <!-- partial -->
        

        <!-- main-panel ends -->
      </div>
      <form>

      
      <!-- page-body-wrapper ends -->
    </div>
    </section>
</section>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    
  </body>
</html>
<?php
}
else{
  if(headers_sent()){
    die('<script type="text/javascript">window.location.href="../../Login/login.php?e=1"</script>');
  }else{
    header("location:../../Login/login.php?e=1");
    die();
  }
}
?>