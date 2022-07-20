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

        <title> Dashboard</title>

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
                                <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                                
                            </div>



                            <div class="row">

                                <div class="container rounded bg-white mt-5 mb-5">
                                    <div class="row">
                                        <div class="col-md-3 border-right">
                                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="img/host.png"><span class="font-weight-bold"><?php echo $t['host_name']; ?></span><span class="text-black-50"><?php echo $t['host_email']; ?></span><span> </span></div>
                                        </div>
                                        <div class="col-md-5 border-right">
                                            <div class="p-3 py-5">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="text-right">Profile Settings</h4>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $t['host_name']; ?>"></div>

                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $t['host_phone']; ?>"></div>
                                                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address line 1" value="<?php echo $t['host_address']; ?>"></div>

                                                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="<?php echo $t['host_email']; ?>"></div>
                                                </div>
                                                <?php 
                                                    $tf=mysqli_query($con,"select * from tbl_rbook rb,tbl_room r where rb.host_id=$t[host_id] and r.room_id=rb.room_id");
                                                    $u=mysqli_fetch_array($tf);
                                                    if(mysqli_num_rows($tf)>0){
                                                        ?>
                                                 <div class="col-md-12"><label class="labels">Room Number</label><input type="text" class="form-control" placeholder="enter email id" value="<?php echo $u['room_no']; ?>"></div>
                                                <?php } ?>
                                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
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
                        <a class="btn btn-primary" href="logout.php">Logout</a>
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
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../Login/login.php?e=1"</script>');
    } else {
        header("location:../Login/login.php?e=1");
        die();
    }
}
?>