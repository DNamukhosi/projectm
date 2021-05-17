<?php 
include("../../inc/connect.php") ;
if(isset($_GET['id']))
      {
      	$sql="DELETE FROM p_visitor WHERE  v_id='".$_GET['id']."'";
      	//exit;
       $conn->query($sql)or die(mysql_error());
            
              header("location:visitors.php");
      }
      else
      	echo "Something went wrong!";
   ?>