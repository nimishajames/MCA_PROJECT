<?php
session_start();
include('connection.php');
if($_SESSION['hosteller']){
    session_destroy();
    header('location:../Login/login.php?e=1');
}
?>