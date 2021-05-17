<?php 
include("../../inc/connect.php") ;
if(isset($_GET['id']))
      {
      	$sql="DELETE FROM sys_user WHERE  user_id='".$_GET['id']."'";
      	$sql1="DELETE FROM nurses WHERE  n_id='".$_GET['id']."'";
      	//exit;
      	$conn->query($sql)or die(mysql_error());
        $conn->query($sql1)or die(mysql_error());
              header("location:attendant.php");
      }
      else
      	echo "Something went wrong";
   ?>