<?php 
include("../../inc/connect.php") ;
if(isset($_GET['id']))
      {
      	//$sql="DELETE FROM login WHERE  id='".$_GET['id']."'";
      	$sql1="DELETE FROM patients WHERE  p_id='".$_GET['id']."'";
      	//exit;
      // $conn->query($sql)or die(mysql_error());
        $conn->query($sql1)or die(mysql_error());
              header("location:patients.php");
      }
      else
      	echo "Somwthing went wrong";
   ?>