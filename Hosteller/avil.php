<?php
include('connection.php');
$a=$_POST['rid'];
$ar=mysqli_query($con,"select count(*) as c from tbl_room where roomtype_id =$a and mem_count>0");
$d=mysqli_fetch_assoc($ar);
echo'<b class="text-danger"> avilabile number of rooms: '.$d['c'].'</b>'
?>
