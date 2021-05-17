<?php
include("../../inc/connect.php") ;

$pat=$_GET['id'];
$vis=$_GET['vis'];
$pis = $conn->query("SELECT * FROM p_medication where p_id='$pat' ") or die(mysqli_error());
$pis1 = $pis->fetch_array();
$date=date("Y-m-d");
$writex =$conn->query("INSERT INTO bed_trans(`p_id`,`name`,`date`,`v_id`,`bed`,`ward`) VALUES ('$pat','$pis1[name]','$date','$vis','$pis1[bed]','$pis1[ward]')") or die(mysqli_error());

            if($writex){
                 echo " <script>alert('Visitor Approved Successifully...')</script>";
				echo " <script>setTimeout(\"location.href='approvevisit.php';\",150);</script>";
            }
           else 
              echo " <script>alert('Something went wrong..');</script>";
?>