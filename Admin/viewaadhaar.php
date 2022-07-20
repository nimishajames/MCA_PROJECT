<?php
include('connection.php');
$la = $_GET['hid'];

$c = mysqli_query($con, "select * from tbl_hosteller where host_id=$la");
$d = mysqli_fetch_assoc($c);
$filename = "../Login/images/" . $d['aadhar'];


header("Content-type: application/pdf");

header("Content-Length: " . filesize($filename));


readfile($filename);
