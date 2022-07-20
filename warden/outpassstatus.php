<?php
session_start();
include('connection.php');
if ($_SESSION['warden']) {
    $id = $_SESSION['warden'];
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

        <title>hostel</title>

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
                               
                            </div>
                            <?php
                            $outpass = mysqli_query($con, "select * from tbl_outpass o ,tbl_hosteller h where h.host_id=o.host_id and status=0")

                            ?>
                            <div class=" card " style="padding:25px;border-radius:25px;">
                                <table class=" table">
                                    <tr>
                                    <th>name</th>
                                    <th>purpose</th>
                                    <th>phone</th>
                                        <th>Applies on</th>
                                        <th>Destination</th>
                                        <th>from</th>
                                        <th>to</th>
                                    </tr>
                                    <?php
                                    while ($r = mysqli_fetch_array($outpass)) {
                                    ?>
                                        <tr>
                                        <th><?php echo $r['host_name']; ?></th>
                                        <th><?php echo $r['O_purpose']; ?></th>
                                        <th><?php echo $r['host_phone']; ?></th>
                                            <?php $d = $r['O_apply']; ?>
                                            <th><?php echo date('d/m/y g:i A', strtotime($d)); ?></th>
                                            <th><?php echo $r['O_place']; ?></th>
                                            <th><?php echo  date('d/m/y ', strtotime($r['OL_date'])); ?></th>
                                            <th><?php echo date('d/m/y ', strtotime($r['OR_date'])); ?></th>
                                            <th><a href='vaoutpass.php?hid=<?php echo $r['host_id']; ?>&Oid=<?php echo $r['O_id']; ?>' class='btn btn-success'>Accept</a>
                                                </th>
                                                <th><a href='reoutpass.php?hid=<?php echo $r['host_id']; ?>&Oid=<?php echo $r['O_id']; ?>' class='btn btn-danger'>Reject</a>
                                                </th>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>

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
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../Login/login.php?e=1"</script>');
    } else {
        header("location:../Login/login.php?e=1");
        die();
    }
}
?>