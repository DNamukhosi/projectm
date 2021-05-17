<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
  include("../../inc/connect.php");
 //session_start();

 
  $vis = $conn->query("SELECT * FROM `patients` where p_id='".$_GET['id']."'") or die(mysqli_error());
$vis1 = $vis->fetch_array();
 
//session_start();
if(isset($_POST['Save']))
{ 
     $vid1=$_POST['vid'];
    $name=$_POST['name'];
    $date=$_POST['date'];
        $att="0";
     $ddt = date("Y-m-d");

    if($date >= $ddt ){
$write =$conn->query("INSERT INTO `p_appointments`(`p_id`,`name`,`date`, `attended`) VALUES ('$vid1','$name','$date','$att')") or die(mysqli_error());

            if($write){
               echo " <script>alert('Records Successfully Inserted..');</script>";
               echo " <script>setTimeout(\"location.href='patients.php';\",150);</script>";
            }
           else 
              echo " <script>alert('Something went wrong..');</script>";
  

    }else{
    echo "<script>alert('Invalid date of birth')</script>";
                        
    }  
    }
    

?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        BOOK PATIENT'S APPOINTMENT
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Book Patient's Appointment
        </li>
      </ol>
    </section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Book Patients's Appoinment</h3>
      <form method="POST" enctype="multipart/form-data" >
    
         <div class="form-group">
                <label for="exampleInputEmail1">Patient ID</label>
                <input type="text" name="vid" class="form-control" value="<?php echo  $vis1['p_id'];?>" placeholder="Enter ID" >
               </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Patient Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo  $vis1['firstname'].' '.$vis1['middlename'].' '.$vis1['lastname'];?>" placeholder="Optional">
               </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="Date" name="date" class="form-control" value = "<?php echo date('Y-m-d'); ?>" required="required" onchange="CheckTime(this.value)">
               </div>
        
       <div class="form-group">&nbsp;&nbsp;&nbsp;
       
<div class="box-footer">
           <button type="submit"  name="Save" class="btn btn-success bg-green" ><i class="fa fa-file-text"></i> Submit</button>
           <!-- <button type="reset"  name="reset" class="btn btn-primary" value="reset"><i class="f fa fa-undo"></i> Reset</button> -->
          <a href="patients.php"><button type="button" name="cancel" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</button></a>
              </div>
  </form>
      </div>
    </div>
  </div>
</div>
  </div>
  <script type = "text/javascript">

   function CheckTime() 
            {
                var dateString = document.getElementById("date").value;
                if(dateString !="")
                {
                    var today = new Date();
                    var birthDate = new Date(dateString); //format is mm.dd.yyyy
                    //var age = today.getFullYear() - birthDate.getFullYear();

                    if(today <= birthDate )
                    {
                        alert("Invalid date");
                        this.value.focus();
                        return false;
                    } 
                } 
                else 
                {
                    alert("please provide appointment date");
                    return false;
                }
            }
          </script>
<?php include "../Include/footer.php";?>