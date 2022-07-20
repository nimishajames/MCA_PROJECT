<?php
include('connection.php');
session_start();
if($_SESSION['admin']){
session_destroy();
header('location:../Login/login.php');
}
?>