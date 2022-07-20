<?php
include('connection.php');
$hid = $_GET['hid'];
$sa = mysqli_query($con, "select * from tbl_hosteller where host_id=$hid");
$t = mysqli_fetch_array($sa);
$sa1 = mysqli_query($con, "select * from tbl_login where login_id=$t[login_id]");
$t1 = mysqli_fetch_array($sa1);
if ($t1['status'] == 1) {
    if (mysqli_query($con, "update tbl_login  set status='0' where login_id=$t[login_id]")) {
        header('location:viewhosteller.php');
    }
} else {
    if (mysqli_query($con, "update tbl_login  set status='1' where login_id=$t[login_id]")) {
        header('location:viewhosteller.php');
    }
}
