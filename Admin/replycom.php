<?php
include('connection.php');
if (isset($_POST["submit"])) {
    $comid = $_POST["cid"];
    $hostid = $_POST["hid"];
    $reply = $_POST['reply'];
    $date =  date("Y-m-d H:i:s");

    $sql1 = "insert into tbl_replycom(reply,host_id,comp_id,rep_date)values('$reply','$hostid','$comid','$date')";
    if (mysqli_query($con, $sql1)) {
        mysqli_query($con, "update tbl_complaint set status='1' where comp_id=$comid");
        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="managecom.php?e=1"</script>');
        } else {
            header("location:managecom.php?e=1");
            die();
        }
    }
}

mysqli_close($con);
