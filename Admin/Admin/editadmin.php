<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
  include("../../inc/connect.php") ;
 //session_start();

  $sql="SELECT * FROM admin WHERE admin_id='".$_GET['id']."'";
  $write =$conn->query($sql) or die(mysqli_error($db_connect));
 // print_r($sql); exit;
    $row=$write->fetch_array();
    $id=$row['admin_id'];
    $fname=$row['firstname'];
    $lname=$row['lastname'];
    $mname=$row['middlename'];
    $username =$row['username'];
    $phone =$row['phone'];
    $idno =$row['idno'];
?>
<?php
//include("../inc/connect.php") ;

//session_start();
if(isset($_POST['Save']))
{ 
    $id=$_POST['id'];

      //$profilepic=$_FILES["profilepic"]["name"];
   
    $fn=$_POST['fname'];
    $mn=$_POST['mname'];
    $ln=$_POST['lname'];
    $usern=$_POST['username'];
    $ph=$_POST['phone'];
     $idn=$_POST['idno'];
     $pass=md5($_POST['password']);
   
      $write =$conn->query("UPDATE admin SET firstname=' $fn',middlename='$mn',lastname='$ln',username='$usern',phone='$ph',idno='$idn',password='$pass' WHERE  admin_id='".$_GET['id']."'") or die(mysqli_error());
        $writex =$conn->query("UPDATE sys_user set `username`='$usern',`password`='$pass' where `user_id`='".$_GET['id']."'") or die(mysqli_error());
    
     echo " <script>alert('Records Successfully Inserted..');</script>";
      echo " <script>setTimeout(\"location.href='admin.php';\",150);</script>";
    }
    

?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        UPDATE ADMINISTRATOR PERSONAL DETAILS
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Admin Personal Info
        </li>
      </ol>
    </section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Update Admin Personal Info</h3>
      <form method="POST" enctype="multipart/form-data" >
    
   <td>
      <!-- <span style="color:red;">*</span><b>Patient_id</b> -->
        <div class="form-group">
           <input type ="hidden" name="id" value="<?php echo  $id;?>">
        </div>      
      </td>
      
          <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>First Name</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="fname" value="<?php echo  $fname;?>" class="form-control" pattern="[A-Za-z]{1,15}" title="Enter characters only">
        </div>
         <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Middle Name</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="mname" value="<?php echo  $mname;?>" class="form-control" pattern="[A-Za-z]{1,15}" title="Enter characters only">
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Last Name</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="lname" value="<?php echo  $lname;?>" class="form-control" pattern="[A-Za-z]{1,15}" title="Enter characters only">
        </div>
         <div class="form-group">&nbsp;&nbsp;&nbsp;
           <span style="color:red;">*</span><b>Username</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="email" name="username" value="<?php echo  $username;?>"  class="form-control">
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Phone</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="phone" value="<?php echo  $phone;?>" required="" class="form-control" pattern="[0-9]{9,12}" title="Enter numerics characters only">
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Id Number</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="idno" value="<?php echo  $idno;?>" required="" class="form-control" pattern="[0-9]{7,8}" title="Enter numerics characters only">
        </div>
       <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Password</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="password" name="password" required="required" class="form-control" title="Enter password">
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Confirm Password</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="password" name="passconf" required="" class="form-control" title="Confirm password">
        </div>
<div class="box-footer">
           <button type="submit"  name="Save" class="btn btn-success bg-green" ><i class="fa fa-file-text"></i> Update</button>
           <!-- <button type="reset"  name="reset" class="btn btn-primary" value="reset"><i class="f fa fa-undo"></i> Reset</button> -->
          <a href="admin.php"><button type="button" name="cancel" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</button></a>
              </div>
  </form>
      </div>
    </div>
  </div>
</div>
  </div>
<?php include "../Include/footer.php";?>