<?php
session_start();
include('connection.php');
if (isset($_SESSION['warden'])) {
    $id = $_SESSION['warden'];
    $sel = mysqli_query($con, "select * from tbl_warden where login_id=$id");
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
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
                                <?php
                                if (isset($_GET['e'])) {
                                ?>
                                    <script>
                                        swal("Success", "Room changed", "Success");
                                    </script>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($_GET['p'])) {
                                ?>
                                    <script>
                                        swal("Success", "Room vacated", "Success");
                                    </script>
                                <?php
                                }
                                ?>
                                <h1 class="h3 mb-0 text-gray-800">Room Requests</h1>
                            </div>

                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Room No</th>
                                    <th>Room Change</th>
                                    <th>Vaccate</th>
                                </tr>
                                <?php
                                $be = mysqli_query($con, "select * from tbl_rbook rb,tbl_hosteller h ,tbl_room r where r.room_id=rb.room_id and h.host_id=rb.host_id ");
                                while ($rq = mysqli_fetch_array($be)) { ?><tr>
                                        <th> <?php echo $rq['host_name']; ?></th>
                                        <th> <?php echo $rq['host_email']; ?></th>
                                        <th> <?php echo $rq['host_phone']; ?></th>
                                        <th> <?php echo $rq['room_no']; ?></th>
                                        <th><a class="btn btn-success" href="changeroom.php?hid=<?php echo $rq['host_id']; ?>&rid=<?php echo $rq['room_id']; ?>">Room Change</a></th>
                                        <th><a class="btn btn-danger" href="vaccate.php?hid=<?php echo $rq['host_id']; ?>&rid=<?php echo $rq['room_id']; ?>">Vaccate</a></th>
                                    </tr><?php } ?>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
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