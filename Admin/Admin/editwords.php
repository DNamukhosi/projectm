<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
  include("../../inc/connect.php") ;
 //session_start();

  $sql="SELECT * FROM words WHERE w_id='".$_GET['id']."'";
  $write =$conn->query($sql) or die(mysqli_error($db_connect));
 // print_r($sql); exit;
    $row=$write->fetch_array();
    $id=$row['w_id'];
    $name=$row['name'];
    $description=$row['description'];
    $capacity=$row['capacity'];
    $avai=$row['available'];
?>
<?php
//include("../inc/connect.php") ;

//session_start();
if(isset($_POST['Save']))
{ 
    $fn=$_POST['name'];
    $mn=$_POST['capacity'];
    $ln=$_POST['description'];
    $av= intval($mn)-intval($row['avai']);
   
      $write =$conn->query("UPDATE words SET name=' $fn',capacity='$mn',description='$ln',available='$av' WHERE  w_id='".$_GET['id']."'") or die(mysqli_error());
        
    
     echo " <script>alert('Records Successfully Inserted..');</script>";
      echo " <script>setTimeout(\"location.href='words.php';\",150);</script>";
    }
    

?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        UPDATE WORDS DETAILS
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Word Info
        </li>
      </ol>
    </section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Update Word Info</h3>
      <form method="POST" enctype="multipart/form-data" >
    
   <td>
      <!-- <span style="color:red;">*</span><b>Patient_id</b> -->
        <div class="form-group">
           <input type ="hidden" name="id" value="<?php echo  $id;?>">
        </div>      
      </td>
      
          <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Word Name</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="name" value="<?php echo  $name;?>" class="form-control"  title="Enter characters only">
        </div>
         <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Description</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="description" value="<?php echo  $description;?>" class="form-control">
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Capacity</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="capacity" value="<?php echo  $capacity;?>" required="" class="form-control" pattern="[0-9]{0,3}" title="Enter numerics characters only">
        </div>
       
<div class="box-footer">
           <button type="submit"  name="Save" class="btn btn-success bg-green" ><i class="fa fa-file-text"></i> Update</button>
           <!-- <button type="reset"  name="reset" class="btn btn-primary" value="reset"><i class="f fa fa-undo"></i> Reset</button> -->
          <a href="words.php"><button type="button" name="cancel" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</button></a>
              </div>
  </form>
      </div>
    </div>
  </div>
</div>
  </div>
<?php include "../Include/footer.php";?>