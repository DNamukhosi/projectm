<?php 
include("../../inc/connect.php") ;
if(isset($_GET['id']))
      {
      	$sql="DELETE FROM login WHERE  id='".$_GET['id']."'";
      	$sql1="DELETE FROM admin WHERE  id='".$_GET['id']."'";
      	//exit;
      	$write =mysql_query($sql) or die(mysql_error($db_connect));
        $write1 =mysql_query($sql1) or die(mysql_error($db_connect));
              header("location:admin.php");
      }
      else
      	echo "Not Sucess";
   ?>