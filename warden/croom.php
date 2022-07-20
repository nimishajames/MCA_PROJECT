<?php
include('connection.php');
$hid = $_GET['hid'];
$roid = $_GET['roid'];
$rid = $_GET['rid'];

$ma = mysqli_query($con, "select * from tbl_hosteller where host_id=$hid");
$mi = mysqli_fetch_assoc($ma);

$room = mysqli_query($con, "select * from tbl_room where room_id=$roid");
$roomfetch = mysqli_fetch_assoc($room);

if ($roomfetch['roomtype_id'] == 1) {
    if (mysqli_query($con, "UPDATE  tbl_rbook SET room_id=$roid WHERE host_id=$hid")) {

        $rd1 = mysqli_query($con, "select * from tbl_room where room_id=$rid");
        $rf1 = mysqli_fetch_array($rd1);
        $upf1 = $rf1['mem_count'];
        $up1 = $upf1 + 1;
        mysqli_query($con, "update tbl_room set mem_count=$up1 where room_id=$rid");

        $rd = mysqli_query($con, "select * from tbl_room where room_id=$roid");
        $rf = mysqli_fetch_array($rd);
        $upf = $rf['mem_count'];
        $up = $upf - 1;
        mysqli_query($con, "update tbl_room set mem_count=$up where room_id=$roid");

        $to_email = $mi['host_email'];
        $subject = "Test email to send from XAMPP";
        $body = "Hi, This message from hostel your room no is'.$rf[room_no]' ";
        $headers = "From: rm9314889@gmail.com";

        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";
        } else {
            echo "Email sending failed!";
        }

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="vaccateroom.php?e=1"</script>');
        } else {
            header("location:vaccateroom.php?e=1");
            die();
        }
    }
} else if ($roomfetch['roomtype_id'] == 2) {
    if (mysqli_query($con, "UPDATE  tbl_rbook SET room_id=$roid WHERE host_id=$hid")) {

        $rd1 = mysqli_query($con, "select * from tbl_room where room_id=$rid");
        $rf1 = mysqli_fetch_array($rd1);
        $upf1 = $rf1['mem_count'];
        $up1 = $upf1 + 1;
        mysqli_query($con, "update tbl_room set mem_count=$up1 where room_id=$rid");

        $rd = mysqli_query($con, "select * from tbl_room where room_id=$roid");
        $rf = mysqli_fetch_array($rd);
        $upf = $rf['mem_count'];
        $up = $upf - 1;
        mysqli_query($con, "update tbl_room set mem_count=$up where room_id=$roid");

        $to_email = $mi['host_email'];
        $subject = "Test email to send from XAMPP";
        $body = "Hi, This message from hostel your room no is'.$rf[room_no]' ";
        $headers = "From: rm9314889@gmail.com";

        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";
        } else {
            echo "Email sending failed!";
        }
        echo '<script> alert("Allocated Successfully");</script>';
        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="vaccateroom.php?e=1"</script>');
        } else {
            header("location:vaccateroom.php?e=1");
            die();
        }
    }
} else {
    if (mysqli_query($con, "UPDATE  tbl_rbook SET room_id=$roid WHERE host_id=$hid")) {

        $rd1 = mysqli_query($con, "select * from tbl_room where room_id=$rid");
        $rf1 = mysqli_fetch_array($rd1);
        $upf1 = $rf1['mem_count'];
        $up1 = $upf1 + 1;
        mysqli_query($con, "update tbl_room set mem_count=$up1 where room_id=$rid");

        $rd = mysqli_query($con, "select * from tbl_room where room_id=$roid");
        $rf = mysqli_fetch_array($rd);
        $upf = $rf['mem_count'];
        $up = $upf - 1;
        mysqli_query($con, "update tbl_room set mem_count=$up where room_id=$roid");

        $to_email = $mi['host_email'];
        $subject = "Test email to send from XAMPP";
        $body = "Hi, This message from hostel your room no is'.$rf[room_no]' ";
        $headers = "From: rm9314889@gmail.com";

        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";
        } else {
            echo "Email sending failed!";
        }
        echo '<script> alert("Allocated Successfully");</script>';
        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="vaccateroom.php?e=1"</script>');
        } else {
            header("location:vaccateroom.php?e=1");
            die();
        }
    }
}
