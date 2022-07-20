<?php
session_start();
include('connection.php');
if (isset($_SESSION['hosteller'])) {
    $id = $_SESSION['hosteller'];
    $sel = mysqli_query($con, "select * from tbl_hosteller where login_id=$id");
    $t = mysqli_fetch_assoc($sel);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="css/prof.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <?php
                include("sidebar.php");
                ?>
                <!-- End of Sidebar -->

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">

                        <!-- Topbar -->
                        <?php
                        include("navbar.php");
                        ?>
                        <!-- End of Topbar -->

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                            </div>



                            <div class="row">
                            <div class="card mb-4">
    <div class="card-header"></div>
    <div class="card-body">
    <div class="col-6" style="margin-left:200px;">
      <div class="card" style="padding:25px;border-radius:25px;">
     <h3>Register complaints</h3><br>
        <div class="card-body">
          <form action="complaint.php" method="POST" class="was-validated">
            <div class="form-group">
              <label for="uname">Select Complaint Type:</label>
              <select id="ctype" class="custom-select" name="ctype" required>
                <option value="">Open this select menu</option>
                <?php
                $cotype=mysqli_query($con, "select * from tbl_comtype");
                while ($cm=mysqli_fetch_array($cotype)){
                ?>
                <option value="<?php echo $cm['comtype_id']; ?>"><?php echo $cm['comtype_name']; ?></option>
                <?php
                }
                ?>

                </select>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback"> invalid select </div>
            </div>
            <div class="form-group">
              <textarea type="text" class="form-control" id="complaint" placeholder="Enter Complaint" name="complaint" pattern="[A-za-z]{1,100}" required></textarea>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
              <input type="hidden" name="hostid" value="<?php echo $t['host_id']; ?>" />
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Complaint Register</button>
          </form>
                </div>
            </div>
        </div>
    </div>
 
</div>

                            </div>
                        </div>

                    </div>




                </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

    </body>

    </html>
    <?php
if(isset($_POST['submit'])){
  $comp=$_POST['ctype'];
  $comptx=$_POST['complaint'];
  $hostid=$_POST['hostid'];
  date_default_timezone_set('Asia/Kolkata');
  $date = date('d-m-y h:i:s');
  
  if(mysqli_query($con,"INSERT INTO tbl_complaint(complaint,host_id,date,comtype_id,status) VALUES ('$comptx','$hostid','$date','$comp','0')")){
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="complaint.php?e=1"</script>');
    } else {
        header("location:complaint.php?e=1");
        die();
    }
  }
}
?>
<?php
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../Login/login.php?e=1"</script>');
    } else {
        header("location:../Login/login.php?e=1");
        die();
    }
}
?>