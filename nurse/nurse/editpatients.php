<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
  include("../../inc/connect.php") ;
 //session_start();

  $sql="SELECT * FROM patients WHERE p_id='".$_GET['id']."'";
  $write =$conn->query($sql) or die(mysqli_error($db_connect));
 // print_r($sql); exit;
    $row=$write->fetch_array();
    $id=$row['p_id'];
    $fname=$row['firstname'];
    $lname=$row['lastname'];
    $mname=$row['middlename'];
    $dob =$row['dob'];
    $phone =$row['phone_no'];
    $idno =$row['idno'];
    $gender =$row['gender'];
    $status =$row['marital_status'];
    $location =$row['physical_location'];
    $occupation =$row['occupation'];
?>
<?php
//include("../inc/connect.php") ;

//session_start();
if(isset($_POST['Save']))
{ 
    $id=$_POST['id'];

     $fn=$_POST['fname'];
    $ln=$_POST['lname'];
     $mn=$_POST['mname'];
     $phon=$_POST['phone'];
     $idn=$_POST['idno'];
     $dobb=$_POST['dob'];
     $loc=$_POST['address'];
     $gende=$_POST['gender'];
     $occ=$_POST['occupation'];
     $statu=$_POST['status'];
   
      $write =$conn->query("UPDATE patients SET firstname=' $fn',middlename='$mn',lastname='$ln',dob='$dobb',phone_no='$phon',idno='$idn',physical_location='$loc',occupation='$occ',marital_status='$statu',gender='$gende' WHERE  p_id='".$_GET['id']."'") or die(mysqli_error());

     echo " <script>alert('Records Successfully Inserted..');</script>";
      echo " <script>setTimeout(\"location.href='patients.php';\",150);</script>";
    }
    

?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        UPDATE PATIENTS PERSONAL DETAILS
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Patient's Personal Info
        </li>
      </ol>
    </section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Update Patient's Personal Info</h3>
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
         <div class="form-group">
                <label for = "birthdate">Birthdate:</label>
        <input class = "form-control" name = "dob" id= "date" type = "date" value="<?php echo  $dob;?>" onchange ="getDate(this.value)" required = "required">
               </div><div class="form-group">
               <label for = "civil_status">Civil Status:</label>
        <select style = "width:22%;" class = "form-control" value="<?php echo  $status;?>" name = "status" required = "required">
          <option value = "">--Please select an option--</option>
          <option value = "Single">Single</option>
          <option value = "Married">Married</option>
        </select>
              </div>
              <div class="form-group">
              <label for = "gender">Gender:</label>
            <select style = "width:22%;" class = "form-control"  value="<?php echo  $gender;?>" name = "gender" required = "required">
              <option value = "">--Please select an option--</option>
              <option value = "Male">Male</option>
              <option value = "Female">Female</option>
            </select>
              </div>
              
         <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Phone</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="phone" value="<?php echo  $phone;?>" required="" class="form-control" pattern="[0-9]{9,12}" title="Enter numerics characters only">
        </div>
        <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Id Number</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="idno" value="<?php echo  $idno;?>" required="" class="form-control" pattern="[0-9]{7,8}" title="Enter numerics characters only">
        </div>
         <div class="form-group">
                <label for = "address">Physical Address:</label>
        <input class = "form-control" name = "address" type = "text" value="<?php echo  $location;?>" class="form-control" required = "required" pattern="[A-Za-z]{1,15}" title="Enter characters only">
               </div>
          
               <div class="form-group">
               <label for="exampleInputEmail1">Occupation</label>
               <input type="text" name="occupation" class="form-control" value="<?php echo  $occupation;?>" placeholder="Enter Occupation" pattern="[A-Za-z]{1,25}" title="Enter characters only">
              </div>
       <div class="form-group">&nbsp;&nbsp;&nbsp;
       
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
  <script type = "text/javascript">
    function getDate() 
            {
                var dateString = document.getElementById("date").value;
                if(dateString !="")
                {
                    var today = new Date();
                    var birthDate = new Date(dateString); //format is mm.dd.yyyy
                    //var age = today.getFullYear() - birthDate.getFullYear();

                    if(today < birthDate )
                    {
                        alert("Invalid date");
                        this.value.focus();
                        return false;
                    } 
                } 
                else 
                {
                    alert("please provide your date of birth");
                    return false;
                }
            }
            
</script> 
<?php include "../Include/footer.php";?>