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
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);
    $phone=$_POST['phone'];
     $idno=$_POST['idno'];
     $type="1";
     $code="AD";
$id="1";
$qq = $conn->query("SELECT * FROM `system_master` where id='$id'") or die(mysqli_error());
$ff = $qq->fetch_array();
$lno=intval($ff['last_no'])+1;
$ln=str_pad($lno, intval($ff['length']), "0", STR_PAD_LEFT);
$dno=$code.$ln;

   if( $password==$cpassword){
     $qry=$conn->query("SELECT * FROM sys_user where `username` ='$username' ")or die (mysqli_error());
    $nrows=$qry->fetch_all();
     if($nrows==null)
      {
        $write =$conn->query("INSERT INTO sys_user(`user_id`,`username`,`password`,`level`) VALUES ('$dno','$username',
          '$password','$type')") or die(mysqli_error());

            $writex =$conn->query("INSERT INTO admin(`admin_id`,`firstname`,`middlename`,`lastname`,`username`,`phone`,`idno`,`password`) VALUES ('$dno','$fname','$mname','$lname','$username','$phone','$idno','$password')") or die(mysqli_error());

            if($write && $writex)
              { echo " <script>alert('Records Successfully Inserted..');</script>";
             $conn->query("update system_master set last_no=last_no+1 where id='$id'") or die(mysqli_error());
           }
           else 
              echo " <script>alert('Something went wrong..');</script>";
      }else{
       echo " <script>alert('Username already exist...');</script>";
      }
   }else
     echo " <script>alert('Password do not match. Please check...');</script>";
     
    }

//$row1[]=mysql_fetch_assoc($query)or die (mysql_error());
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       MANAGE ADMINISTRATORS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Admin - List</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">ADMINISTRATORS</h3>
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
          <h4 class="modal-title"> Add Admin</h4>
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
               <label for="exampleInputEmail1">User Name</label>
               <input type="email" name="username" class="form-control" placeholder="Enter Email" required="required">
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
              <label for="exampleInputFile">Password</label>
              <input type="Password" name="password" class="form-control" required="required" placeholder="">
              </div> 
               <div class="form-group">
              <label for="exampleInputFile">Confirm Password</label>
              <input type="Password" name="cpassword" class="form-control" required="required" placeholder="">
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
<th>Admin id</th>
  <th>Name</th>
  <th>User Name</th>
  <th>Phone</th>
  <th>ID NO.</th>
  <th>Option</th>
                  
</tr>
</thead>
<tbody>
<?php 
    //wnd of sdAVE\
include("../../inc/connect.php") ;
    
$query=$conn->query("SELECT admin_id,concat(firstname,' ',middlename,' ',lastname) as name,username,phone,idno FROM admin order by admin_id")or die (mysqli_error());
$numrows=$query->num_rows;
//echo $numrows; exit;
while($row = $query->fetch_array()){
   

?> <tr>
 
<td><?php echo $row['admin_id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['username'];?></td>
<td><?php echo $row['phone'];?></td>
<td><?php echo $row['idno'];?></td>
<td><a href="editadmin.php?id=<?php echo $row['admin_id']; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a>
 <a href="deletes.php?id=<?php echo $row['admin_id']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
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
  <script type="text/javascript">
    // This function will validate Name.
function allLetter()
{ 
var uname = document.getElementById("fname").value;
var letters = /^[A-Za-z]+$/;
if(uname.value.match(letters))
{
// Focus goes to next field i.e. Address.
document.registration.address.focus();
return true;
}
else
{
alert('Contains alphabet characters only');
uname.focus();
return false;
}
}

  </script>
 <?php include"../Include/footer.php";?>