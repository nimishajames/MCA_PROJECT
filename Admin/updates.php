<?php
include('connection.php');
$cpid=$_GET['scoid'];
if(mysqli_query($con, "update tbl_scomp set status='1' where scomp_id=$cpid"))
{
header('location:staffcomplaint.php');
}
?>