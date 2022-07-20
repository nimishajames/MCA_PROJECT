<?php
include('connection.php');
$br=$_GET['hid'];
if(mysqli_query($con,"insert into tbl_booked(book_amount,host_id)values('26000','$br') ")){
    echo'<script>alert("Payment scuessfull");</script>';
    header('location:hostelfee.php');
}
?>