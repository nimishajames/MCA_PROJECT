
<?php
include('connection.php');
                            if(isset($_POST['submit'])){
                                $food=$_POST['food'];
                                $fe=mysqli_query($con,"select * from tbl_food where food='$food'");
                                if(mysqli_num_rows($fe)<1){
                                mysqli_query($con,"insert into tbl_food(food)values('$food')");
                                header('location:mess.php');
                      
                            }else{
                                echo'<script> alert("already exist")</script>';
                                header('location:mess.php');
                            }
                            }

                            ?>