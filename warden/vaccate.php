<?php
include('connection.php');
$hid = $_GET['hid'];
$rid = $_GET['rid'];
$room = mysqli_query($con, "select * from tbl_room where room_id=$rid");
$roomfetch = mysqli_fetch_assoc($room);
if ($roomfetch['roomtype_id'] == 1) {
    if (mysqli_query($con, "delete from  tbl_rbook where room_id=$rid and host_id=$hid")) {

        $rd1 = mysqli_query($con, "select * from tbl_room where room_id=$rid");
        $rf1 = mysqli_fetch_array($rd1);
        $upf1 = $rf1['mem_count'];
        $up1 = $upf1 + 1;
        mysqli_query($con, "update tbl_room set mem_count=$up1 where room_id=$rid");

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="vaccateroom.php?p=1"</script>');
        } else {
            header("location:vaccateroom.php?p=1");
            die();
        }
    }
} else if ($roomfetch['roomtype_id'] == 2) {
    if (mysqli_query($con, "delete from tbl_rbook where room_id=$rid and host_id=$hid")) {

        $rd1 = mysqli_query($con, "select * from tbl_room where room_id=$rid");
        $rf1 = mysqli_fetch_array($rd1);
        $upf1 = $rf1['mem_count'];
        $up1 = $upf1 + 1;
        mysqli_query($con, "update tbl_room set mem_count=$up1 where room_id=$rid");

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="vaccateroom.php?p=1"</script>');
        } else {
            header("location:vaccateroom.php?p=1");
            die();
        }
    }
} else {
    if (mysqli_query($con, "delete from tbl_rbook where room_id=$rid and host_id=$hid")) {

        $rd1 = mysqli_query($con, "select * from tbl_room where room_id=$rid");
        $rf1 = mysqli_fetch_array($rd1);
        $upf1 = $rf1['mem_count'];
        $up1 = $upf1 + 1;
        mysqli_query($con, "update tbl_room set mem_count=$up1 where room_id=$rid");

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="vaccateroom.php?p=1"</script>');
        } else {
            header("location:vaccateroom.php?p=1");
            die();
        }
    }
}
