<?php
include('connection.php');
$hid=$_GET['hid'];
$Oid=$_GET['Oid'];
if(mysqli_query($con,"update tbl_outpass set status='2' where host_id=$hid and O_id=$Oid")){
    header('location:outpassstatus.php');
}
?>