<?php 
include("../../inc/connect.php") ;
  
    //session_start();
  $sql="SELECT * FROM doctors WHERE d_id='".$_GET['id']."'";
  $write = $conn->query($sql) or die(mysqli_error());
 // print_r($sql); exit;
    $row=$write->fetch_array();
    $id=$row['d_id'];
    $name=$row['firstname'].' '.$row['middlename'].' '.$row['lastname'];
    $idno=$row['idno'];
    $phone =$row['phone'];
    $gender=$row['gender'];
    $speci=$row['specialization'];
   //print_r($row); exit;
   $write1 = $conn->query("select * from sys_user where user_id='".$_GET['id']."'") or die(mysqli_error());
   $row1=$write1->fetch_array();
    $username=$row1['username'];
?>

<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Patient Personal Info
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Doctor Personal Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

<div class="container">
  <div class="box box-primary">
    <h3 >&nbsp;&nbsp;&nbsp;Doctor Personal Info</h3>
   <div class="box-body box-profile" >
    <form method="POST" enctype="multipart/form-data" >
       <div class="col-md-8">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="color:red;"></span><b>Full Name</b>
    <div class="form-group">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $name;?></div>
    <div class="col-md-2">
<span style="color:red;"></span><b>Email</b><br>
<?php echo  $username;?>
</div>
 
   <div class="col-md-2">
<span style="color:red;"></span><b>Gender</b><br>
<?php echo  $gender;?>
</div>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
  <div class="col-md-2" >
    <span style="color:red;"></span><b>Doctor ID</b><br>
 <?php echo  $id;?>
</div>
     <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
 <div class="col-md-2" >
<span style="color:red;"></span><b>ID NO</b><br>
   <?php echo  $idno;?>
 </div>
 <div class="col-md-2" >
   <span style="color:red;"></span><b>Phone No.</b><br>
  <?php echo $phone ; ?>
</div><br><br><br><br>
 <div class="col-md-2" >
    <span style="color:red;"></span><b>Specialization</b><br>
 <?php echo  $speci;?>
</div>
  
<div class="box-footer">
    <a href="doctor.php"><button type="button" name="cancel" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</button></a>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
</div>
 <?php include "../../Include/footer.php";?>