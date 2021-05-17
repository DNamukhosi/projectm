<?php 
include("../../inc/connect.php") ;
if(isset($_GET['id']))
      {
      	$sql="DELETE FROM beds WHERE  w_id='".$_GET['id']."'";
      	//exit;
      	$conn->query($sql)or die(mysql_error());
              header("location:beds.php");
      }
      else
      	echo "Something went wrong";
   ?>