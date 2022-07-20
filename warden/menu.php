<?php
include('connection.php');
                            if(isset($_POST['submit'])){
                                $day=$_POST['day'];
                                $hour=$_POST['foodhour'];
                                $item=$_POST['fooditem'];
                               if(mysqli_query($con,"update tbl_messfoodmenu set `$hour`='$item' where `$hour`=$hour and menu_week='$day'"))
                             {  header('location:messfood.php');
                      
                            }else{
                                
                                header('location:messfood.php');
                            }
                        }  

                            ?>