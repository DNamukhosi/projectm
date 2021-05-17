<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
 include("../../inc/connect.php");
  
 $vis = $conn->query("SELECT * FROM doctors WHERE d_id='$_SESSION[d_id]'") or die(mysqli_error());
$vis1 = $vis->fetch_array();
//print_r($row); exit;
    $fname =$vis1['firstname'];
    $lname=$vis1['lastname'];
    $mname=$vis1['middlename'];
     $phone=$vis1['phone'];
      $idno=$vis1['idno'];
    $username=$vis1['username'];
    $password=$vis1['password'];

?>
<?php
//include("../inc/connect.php") ;

//session_start();
if(isset($_POST['submit']))
{ //print_r($_POST); exit;
  
    $flag=0;
  $pswd=$_POST['pswd'];
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $phone=$_POST['phone'];
  $idno=$_POST['idno'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $password1=md5($password);
  $Confirmpassword=$_POST['Confirmpassword'];
  if(!empty($password))
  {
    if($password==$Confirmpassword)
    {
      $write=mysqli_query("UPDATE doctors SET firstname='$fname',lastname='$lname',middlename='$mname',phone='$phone',idno='$idno',username='$username',password='$password1' WHERE username='".$_SESSION['username']."'")or die(mysqli_error());
      $_SESSION['username']=$username;
      echo " <script>alert('Records Successfully Updated..');</script>";
    }
    else
    {
      echo " <script>alert('Password Doesn't Match');</script>";
    }
  }
  else
  {
    $password=$pswd;
    $write=mysqli_query("UPDATE login SET profile='$name',fname='$fname',lname='$lname',username='$username',password='$password' WHERE username='".$_SESSION['username']."'")or die(mysqli_error());
      $_SESSION['username']=$username;
      echo " <script>alert('Records Successfully Updated..');</script>";
  }

  }
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Doctor's Profile
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
   <section class="content">
      <div class="row">
        <div class="col-md-12">
       <div class="box box-primary">
          <div class="box-header with-border">
            <div class="col-md-4">
              <div style="float: right;" >
               <b> First Name:</b>&nbsp; 
         <?php echo $fname; ?><br>
         <b> Middle Name:</b>&nbsp; 
         <?php echo $mname; ?><br>
         <b>Last Name:</b>&nbsp;
         <?php echo $lname; ?><br>
         <b>Phone No.:</b>&nbsp;
         <?php echo $phone; ?><br>
         <b>ID No:</b>&nbsp;
         <?php echo $idno; ?><br>
         <b> Email:</b>&nbsp; 
          <?php echo $username; ?><br>
       </div>
<img src="../../Upload/download.jpg" class="img-circle" alt="User Image" style="height:100px;width:100px;" class="form-control" style="float: left;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       </div>
     </div>
     </div>
   </div>
 </div>
<div class="box box-primary">
  <div class="box-header with-border">
<i class="fa fa-user"></i> <h3 class="box-title">Profile</h3>
<form method="POST" enctype="multipart/form-data" >
   <div class="box-body">
      <div class="col-md-12">
          <label>First Name</label><br>
          <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>" pattern="[A-Za-z]{1,15}" title="Enter characters only"><br>
          <label>Middle Name</label><br>
          <input type="text" name="mname" class="form-control" value="<?php echo $mname; ?>" pattern="[A-Za-z]{1,15}" title="Enter characters only"><br>
          <label>Last Name</label><br>
          <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>" pattern="[A-Za-z]{1,15}" title="Enter characters only"><br>

<label>Phone No</label><br>
          <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>" pattern="[0-9]{7,8}" title="Enter numeric finger of atmost eight characters"><br>
<label>ID No</label><br>
          <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>" pattern="[0-9]{7,8}" title="Enter numeric finger of atmost eight characters"><br>
          <div class="form-group">
          <label for="exampleInputEmail1">UserName</label>
          <input type="email" class="form-control" name="username" value="<?php echo $username;?>">
          </div>
          <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="hidden" name="pswd" class="form-control" value="<?php echo $password;?>" >
          <input type="password" name="password" class="form-control" >
          </div>
          <div class="form-group">
          <label for="exampleInputPassword1">Confirm Password</label>
          <input type="password" name="Confirmpassword" class="form-control">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form> 
   </div>
  </div>
</section>
</div>
<?php include "../Include/footer.php";?>