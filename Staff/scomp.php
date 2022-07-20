<?php
include('connection.php');
if(isset($_POST['submit'])){
    $sid=$_POST['sid'];
    $complaint=$_POST['complaint'];
    if(mysqli_query($con,"insert into tbl_scomp(s_id,scomp)values('$sid','$complaint')")){
     if(headers_sent()){
         die('<script type="text/javascript">window.location.href="comstaff.php?e=1"</script>');
         
      }else{
         header('location:comstaff.php');
         die();
      }
   
 
    }
 
 }
?>