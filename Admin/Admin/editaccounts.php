<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
  include("../../inc/connect.php") ;
 //session_start();
  $sql="SELECT * FROM accountant WHERE id='".$_GET['id']."'";
  $write =mysql_query($sql) or die(mysql_error($db_connect));
 // print_r($sql); exit;
    $row=mysql_fetch_array($write)or die (mysql_error($db_connect));
    $id=$row['id'];
    $fname=$row['fname'];
    $lname=$row['lname'];
    $username =$row['username'];
    $phone =$row['phone'];
   //print_r($row); exit;
   //echo "$firstname"; exit();
?>
<?php
//include("../inc/connect.php") ;

//session_start();
if(isset($_POST['Save']))
{ 
    $id=$_POST['id'];
   
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $phone=$_POST['phone'];
   
      $write =mysql_query("UPDATE accountant SET fname=' $fname',lname='$lname',username='$username',phone='$phone' WHERE  id='".$_GET['id']."'") or die(mysql_error($db_connect));

       $writex =mysql_query("UPDATE login set `fname`='$fname',`lname`='$lname',`username`='$username',`phone`='$phone' where  `user_code`='".$_GET['id']."'")or die(mysql_error($db_connect));
      //$query=mysql_query("SELECT * FROM user ")or die (mysql_error());
        $deposit =mysql_query("update system_master set last_no=last_no+1 where id='$id'") or die(mysql_error($db_connect));
      //$numrows=mysql_num_rows($query)or die (mysql_error());
      echo " <script>alert('Records Successfully Inserted..');</script>";
      echo " <script>setTimeout(\"location.href='accounts.php';\",150);</script>";
    }
    

?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Edit Accountant Personal Info
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Accountant Personal Info
        </li>
      </ol>
    </section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Edit Accountant Personal Info</h3>
      <form method="POST" enctype="multipart/form-data" >
    
   <td>
      <!-- <span style="color:red;">*</span><b>Patient_id</b> -->
        <div class="form-group">
           <input type ="hidden" name="id" value="<?php echo  $id;?>">
        </div>      
      </td>
          <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>First Name</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="fname" value="<?php echo  $fname;?>" class="form-control" required="required" pattern="[A-Za-z]{1,15}" title="Enter characters only">
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Last Name</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="lname" value="<?php echo  $lname;?>" class="form-control" required="required" pattern="[A-Za-z]{1,15}" title="Enter characters only">
        </div>
         <div class="form-group">&nbsp;&nbsp;&nbsp;
           <span style="color:red;">*</span><b>Username</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="email" name="username" value="<?php echo  $username;?>"  class="form-control">
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Phone</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="phone" value="<?php echo  $phone;?>" class="form-control" required="required" pattern="[0-9]{9,12}" title="Enter numerics characters only">
        </div>
       <br><br><br>

<div class="box-footer">
           <button type="submit"  name="Save" class="btn btn-success bg-green" ><i class="fa fa-file-text"></i> Save</button>
           <!-- <button type="reset"  name="reset" class="btn btn-primary" value="reset"><i class="f fa fa-undo"></i> Reset</button> -->
          <a href="attendant.php"><button type="button" name="cancel" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</button></a>
              </div>
  </form>
      </div>
    </div>
  </div>
</div>
  </div>
<?php include "../Include/footer.php";?>