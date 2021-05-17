<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
//save values
//session_start();
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
     $mname=$_POST['mname'];
     $phone=$_POST['phone'];
     $idno=$_POST['idno'];
     $dob=$_POST['dob'];
     $loc=$_POST['address'];
     $gender=$_POST['gender'];
     $occ=$_POST['occupation'];
     $status=$_POST['status'];

     $code="P";
$id="6";
$qq = $conn->query("SELECT * FROM `system_master` where id='$id'") or die(mysqli_error());
$ff = $qq->fetch_array();
$lno=intval($ff['last_no'])+1;
$ln=str_pad($lno, intval($ff['length']), "0", STR_PAD_LEFT);
$dno=$code.$ln;

 $ddt = date("Y-m-d");

		if($dob < $ddt ){
            $writex =$conn->query("INSERT INTO patients(`p_id`,`firstname`,`middlename`,`lastname`,`dob`,`phone_no`,`idno`,`physical_location`,`occupation`,`marital_status`,`gender`) VALUES ('$dno','$fname','$mname','$lname','$dob','$phone','$idno','$loc','$occ','$status','$gender')") or die(mysqli_error());

            if($writex){
               echo " <script>alert('Records Successfully Inserted..');</script>";
               $conn->query("update system_master set last_no=last_no+1 where id='$id'") or die(mysqli_error());

            }
           else 
              echo " <script>alert('Something went wrong..');</script>";
  }else{
		echo "<script>alert('Invalid date of birth')</script>";
                        
		}  
}
//$row1[]=mysql_fetch_assoc($query)or die (mysql_error());
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       MANAGE PATIENTS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Patients</a></li>
        <li class="active">Patients - List</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">PATIENTS</h3>
      </div>
         <div class="box-header">
           <button type="button" class="popup" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-square"></i> Add New</button>
         <a href="pdf.php"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Print </span></a>
</div>
      <div class="modal fade" id="myModal" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Add Patient</h4>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required="required" pattern="[A-Za-z]{1,15}" title="Enter characters only">
               </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Middle Name</label>
                <input type="text" name="mname" class="form-control" placeholder="Optional"  pattern="[A-Za-z]{1,15}" title="Enter characters only">
               </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required="required" pattern="[A-Za-z]{1,15}" title="Enter characters only">
               </div>
               <div class="form-group">
                <label for = "birthdate">Birthdate:</label>
				<input class = "form-control" name = "dob" id= "date" type = "date" onchange ="getDate(this.value)" required = "required">
               </div><div class="form-group">
               <label for = "civil_status">Civil Status:</label>
				<select style = "width:22%;" class = "form-control" name = "status" required = "required">
					<option value = "">--Please select an option--</option>
					<option value = "Single">Single</option>
					<option value = "Married">Married</option>
				</select>
              </div>
              <div class="form-group">
              <label for = "gender">Gender:</label>
						<select style = "width:22%;" class = "form-control" name = "gender" required = "required">
							<option value = "">--Please select an option--</option>
							<option value = "Male">Male</option>
							<option value = "Female">Female</option>
						</select>
              </div>
              
               <div class="form-group">
              <label for="exampleInputPassword1">Phone</label>
              <input type="text" name="phone" class="form-control" placeholder="Enter Name" required="required" pattern="[0-9]{9,12}" title="Enter numeric characters only">
              </div>
              <div class="form-group">
              <label for="exampleInputPassword1">ID Number</label>
              <input type="text" name="idno" class="form-control" placeholder="Enter ID" required="required" pattern="[0-9]{7,8}" title="Enter numeric characters only">
              </div>
              <div class="form-group">
                <label for = "address">Physical Address:</label>
				<input class = "form-control" name = "address" type = "text" class="form-control" required = "required" pattern="[A-Za-z]{1,15}" title="Enter characters only">
               </div>
					
               <div class="form-group">
               <label for="exampleInputEmail1">Occupation</label>
               <input type="text" name="occupation" class="form-control" placeholder="Enter Occupation" pattern="[A-Za-z]{1,25}" title="Enter characters only">
              </div>
              
           <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
      </div>
      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
<td>

</td>
<div class="box-body">
<table id="example1" class="table table-bordered table-hover">
<thead>
 <tr>
<th>P.ID</th>
  <th>Name</th>
  <th>Gender</th>
  <th>Phone</th>
  <th>ID NO.</th>
   <th>Age</th>
  <th>Option</th>
                  
</tr>
</thead>
<tbody>
<?php 
    //wnd of sdAVE\
include("../../inc/connect.php") ;
    
$query=$conn->query("SELECT p_id,concat(firstname,' ',middlename,' ',lastname) as name,gender,phone_no,idno,dob FROM patients order by p_id")or die (mysqli_error());
$numrows=$query->num_rows;
//echo $numrows; exit;
while($row = $query->fetch_array()){
   

?> <tr>
 
<td><?php echo $row['p_id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['phone_no'];?></td>
<td><?php echo $row['idno'];?></td>
<td><?php echo $row['dob'];?></td>
<td>
  <a href="patapp.php?id=<?php echo $row['p_id']; ?>" ><span class="btn btn-success bg-blue"><i class="fa fa-info"></i> Appointment </span></a>
  <a href="editpatients.php?id=<?php echo $row['p_id']; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a>
 <a href="delete.php?id=<?php echo $row['p_id']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
</tr>
<?php }
$conn->close();
  ?>
  </tbody>
</table>
</div>
        
        </div>
      </div>       
      </div>
    </section>
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
 <?php include"../Include/footer.php";?>