<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
//error_reporting(0);
//book appointment
if(isset($_POST['submita']))
{
    $vid1=$_POST['vid'];
    $name=$_POST['name'];
    $date=$_POST['date'];
     $ph=$_POST['ph'];
      $idn=$_POST['idn'];
       $pname=$_POST['pname'];
     $ddt = date("Y-m-d");

    if($date >= $ddt ){
$write =$conn->query("INSERT INTO `v_appointments`(`v_id`,`name`,`date`,`phone_no`,`idno`,`patient`) VALUES ('$vid1','$name','$date','$ph','$idn','$pname')") or die(mysqli_error());

            if($write){
               echo " <script>alert('Records Successfully Inserted..');</script>";
               //$_SESSION["vid"]=null;
            }
           else 
              echo " <script>alert('Something went wrong..');</script>";
  

    }else{
    echo "<script>alert('Invalid date of birth')</script>";
                        
    }  
}
//save visitor
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
     $mname=$_POST['mname'];
     $phone=$_POST['phone'];
     $idno=$_POST['idno'];
     $loc=$_POST['address'];
     $gender=$_POST['gender'];

     $code="V";
$id="7";
$qq = $conn->query("SELECT * FROM `system_master` where id='$id'") or die(mysqli_error());
$ff = $qq->fetch_array();
$lno=intval($ff['last_no'])+1;
$ln=str_pad($lno, intval($ff['length']), "0", STR_PAD_LEFT);
$dno=$code.$ln;

 $writex =$conn->query("INSERT INTO p_visitor(`v_id`,`firstname`,`middlename`,`lastname`,`phone_no`,`idno`,`physical_location`) VALUES ('$dno','$fname','$mname','$lname','$phone','$idno','$loc')") or die(mysqli_error());

            if($writex){
               echo " <script>alert('Records Successfully Inserted..');</script>";
               $conn->query("update system_master set last_no=last_no+1 where id='$id'") or die(mysqli_error());

            }
           else 
              echo " <script>alert('Something went wrong..');</script>";
  
}
//$row1[]=mysql_fetch_assoc($query)or die (mysql_error());
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       MANAGE VISITORS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Visitors</a></li>
        <li class="active">Visitors - List</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">VISITORS</h3>
      </div>
         <div class="box-header">
           <button type="button" class="popup" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-square"></i> Add New</button>
         <button type="button" onclick="window.print();" class="btn btn-print"> Print</button>
</div>
      <div class="modal fade" id="myModal" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Add A Visitor</h4>
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
<!---------  appointment model  -->
       <div class="modal fade" id="myModal1" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Book Visitor's Appointment</h4>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
            <?php  
            var_dump($_GET['id']);
$vis = $conn->query("SELECT * FROM `p_visitor` where v_id='".$_GET['id']."'") or die(mysqli_error());
$vis1 = $vis->fetch_array();
//$_SESSION['vid']=null;
            ?>
                <div class="form-group">
                <label for="exampleInputEmail1">Visitor ID</label>
                <input type="text" name="vid" class="form-control" value="<?php echo  $vis1['v_id'];?>" placeholder="Enter ID" >
               </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Visitor Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo  $vis1['firstname'].' '.$vis1['middlename'].' '.$vis1['lastname'];?>" placeholder="Optional">
               </div>
               <div class="form-group">
                <label for="exampleInputEmail1">ID No</label>
                <input type="text" name="idn" class="form-control" value="<?php echo  $vis1['idno'];?>" >
               </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Phone No.</label>
                <input type="text" name="ph" class="form-control" value="<?php echo  $vis1['phone_no'];?>" >
               </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Patient Name</label>
                <input type="text" name="pname" class="form-control" placeholder="enter patient's name" required="required">
               </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="Date" name="date" class="form-control" value = "<?php echo date('Y-m-d'); ?>" required="required" onchange="CheckTime(this.value)">
               </div>
                            
           <div class="box-footer">
          <button type="submit" name="submita" class="btn btn-primary">Submit</button>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default"   data-dismiss="modal">Close</button>
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
  <th>V.ID</th>
  <th>Name</th>
  <th>Gender</th>
  <th>Phone</th>
  <th>ID NO.</th>
  <th>P. Location</th>
  <th>Option</th>
                  
</tr>
</thead>
<tbody>
<?php 
    //wnd of sdAVE\
include("../../inc/connect.php") ;
    
$query=$conn->query("SELECT v_id,concat(firstname,' ',middlename,' ',lastname) as name,gender,phone_no,idno,physical_location FROM p_visitor order by v_id")or die (mysqli_error());
$numrows=$query->num_rows;
//echo $numrows; exit;
while($row = $query->fetch_array()){
   

?> <tr>
 
<td><?php echo $row['v_id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['phone_no'];?></td>
<td><?php echo $row['idno'];?></td>
<td><?php echo $row['physical_location'];?></td>
<td>

 <a href="bookappointment.php?id=<?php echo $row['v_id']; ?>" ><span class="btn btn-success bg-blue"><i class="fa fa-info"></i> Appointment </span></a>
  <a href="editvisitors.php?id=<?php echo $row['v_id']; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a>
 <a href="delete.php?id=<?php echo $row['v_id']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
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
  
 <?php include"../Include/footer.php";?>