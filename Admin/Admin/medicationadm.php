<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
  include("../../inc/connect.php") ;
 //session_start();

  $sql="SELECT * FROM patients WHERE p_id='".$_GET['id']."'";
  $write =$conn->query($sql) or die(mysqli_error($db_connect));
  //get beds n words
  $qq="1";
   $sq=$conn->query("SELECT * FROM p_medication WHERE p_id='".$_GET['id']."' and admitted='$qq' and discharged<>'$qq'") or die(mysqli_error($db_connect));
  $wr =$sq->fetch_array();

//get adm bed
  $sqlb=$conn->query("SELECT * FROM beds WHERE b_id='".$wr['bed']."'") or die(mysqli_error($db_connect));
  $writeb =$sqlb->fetch_array();
   $bds=$writeb['b_id'].' '.$writeb['name'];
//get adm ward
  $sqlw=$conn->query("SELECT * FROM words WHERE w_id='".$wr['ward']."'") or die(mysqli_error($db_connect));
  $writew =$sqlw->fetch_array();
  $wrd=$wr['ward'].' '.$writew['name'];
  //
  $row = mysqli_query($conn, "SELECT w_id,name FROM `words` order by w_id") or die(mysqli_error());
  $row1 = mysqli_fetch_all($row);

 // print_r($sql); exit;
  $row=$write->fetch_array();
  $id=$row['p_id'];
  $name=$row['firstname'].' '.$row['middlename'].' '.$row['lastname'];
  $doc =$_SESSION['admin_id'];
  $date =date('Y-m-d');
?>
<?php

//session_start();
if(isset($_POST['save']))
{ 
    

     $fn=$_POST['comments'];
    $ln=$_POST['remarks'];
   
      $write =$conn->query("insert into `p_medication`(p_id,name,date,d_id,notes,remarks) values ('$id','$name','$date','$doc','$fn','$ln')") or die(mysqli_error());
 $write1 =$conn->query("update `p_appointments` set attended='$rhos' where p_id='$id' and date='$date'")  or die(mysqli_error());
     echo " <script>alert('Records Successfully Inserted..');</script>";
    }
    if(isset($_POST['save1']))
    { 
    

     $fn=$_POST['word'];
    $ln=$_POST['bed'];
    $rhos = "1";
    $rho = "0";
      $write =$conn->query("update `p_medication` set bed='$ln',ward='$fn' where p_id='$id' and date='$date'")  or die(mysqli_error());

      $write1 =$conn->query("update `beds` set occupied='$rho' where b_id='$wr[bed]'")  or die(mysqli_error());
       $write2 =$conn->query("update `beds` set occupied='$rhos' where b_id='$ln'")  or die(mysqli_error());

     echo " <script>alert('Records Successfully Inserted..');</script>";
    }
     if(isset($_POST['save12']))
    { 
    echo " <script>confirm('Are you sure you want to discharge this patients??');</script>";

      $fn=$_POST['comm'];
       $ln=$_POST['rem'];
       $rhos = "1";
      $rho = "0";
      $write =$conn->query("update `p_medication` set discharged='$rhos',discharge_date='$date',cleared_by='$_SESSION[d_id]' where p_id='$id' ")  or die(mysqli_error());

      $write1 =$conn->query("update `beds` set occupied='$rho' where b_id='$wr[bed]'")  or die(mysqli_error());

       echo " <script>alert('Records Successfully Inserted..');</script>";
    
    }

     
    

?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        INPATIENT MEDICAL HISTORY
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient's Medical Info
        </li>
      </ol>
    </section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title"><?php echo $name;?> Medical Information (WARD:<?php echo $wrd; ?> BED: <?php echo $bds;?>)</h3>
      <div class="box-header">
           <button type="button" class="popup" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-square"></i> Add New</button>
           <button type="button" class="popup" data-toggle="modal" data-target="#myModal1" ><i class="fa fa-plus-circle"></i> Switch Bed</button>
             <button type="button" class="popup" data-toggle="modal" data-target="#myModal2" ><i class="fa fa-plus-close"></i> Discharge</button>
</div>
<!-- modal patients medications info -->
      <div class="modal fade" id="myModal" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Add Medical Info</h4>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                <label for="exampleInputEmail1">Comments</label>
                <input type="textarea" name="comments" class="form-control" placeholder="Enter comments" required="required">
               </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Additional Remarks</label>
                <input type="textarea" name="remarks" class="form-control" placeholder="Enter remarks" >
               </div>
                            
           <div class="box-footer">
          <button type="submit" name="save" class="btn btn-primary">Submit</button>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
      </div>
      </div>
      <!--modal discharge -->
        <div class="modal fade" id="myModal2" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Add Discharge Remarks</h4>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                <label for="exampleInputEmail1">Comments</label>
                <input type="textarea" name="comm" class="form-control" placeholder="Enter comments" required="required">
               </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Additional Remarks</label>
                <input type="textarea" name="rem" class="form-control" placeholder="Enter remarks" >
               </div>
                            
           <div class="box-footer">
          <button type="submit" name="save12" class="btn btn-primary">Discharge</button>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
      </div>
      </div>
      <!-- modol 1 -->
      <div class="modal fade" id="myModal1" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Allocate Patient To a Word</h4>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                <label for="exampleInputEmail1">Wards</label>
               <select name = "word" class = "form-control" onChange="getAmt(this.value);"  required = "required">
                <?php foreach ($row1 as $p) {?>
                <option value = "<?php echo $p['0'];?>"><?php echo $p['1'];?></option>
                 <?php } ?>
              </select>
               </div>
                <div id="subject">
              
              
            </div>
              
                            
           <div class="box-footer">
          <button type="submit" name="save1" class="btn btn-primary">Submit</button>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
      </div>
      </div>
      <form method="POST" enctype="multipart/form-data" >
    
   <td>
      <!-- <span style="color:red;">*</span><b>Patient_id</b> -->
        <?php
          $query=$conn->query("SELECT * FROM p_medication where p_id='$id'order by p_id")or die (mysqli_error());
            $numrows=$query->num_rows;
//echo $numrows; exit;
while($row = $query->fetch_array()){
  $doctor=$conn->query("SELECT * FROM  doctors where d_id='$row[d_id]'")or die (mysqli_error());
  $rw = $doctor->fetch_array();
  $dd=$rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname'];
        ?>
         <div class="form-group">&nbsp;
            <span style="color:red;">*</span><b>Medication Notes On <?php echo  $date; ?></b><br>
            <input type ="textarea" name="ame" value="<?php echo $row['notes'];?>" class="form-control">
            <span style="color:red;">*</span><b>Additional Remarks</b><br>
             <input type ="text" name="lna" value="<?php echo $row['remarks'];?>" class="form-control" >
             <i>Doctors: <?php echo $dd; ?></i>
        </div>
      <?php }
      $conn->close();
       ?>
        
  </form>
      </div>
    </div>
  </div>
</div>
  </div>
 <script>
function getAmt(val) {
    $.ajax({
    type: "POST",
    url: "get-bed.php",
    data:'classid='+val,
    success: function(data){
        $("#subject").html(data);
        
    }
    });
    }
</script>
<?php include "../Include/footer.php";?>