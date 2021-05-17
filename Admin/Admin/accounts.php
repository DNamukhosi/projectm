<?php include"../Include/header.php";
 include"../Include/sidebar.php";
//save values
//session_start();
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);
    $phone=$_POST['phone'];
  $code="AC";
$id="5";
$qq = mysql_query("SELECT * FROM `system_master` where id='$id'") or die(mysqli_error());
$ff = mysql_fetch_array($qq);
$lno=intval($ff['last_no'])+1;
$ln=str_pad($lno, intval($ff['length']), "0", STR_PAD_LEFT);
$dno=$code.$ln;

      $type="5";
     if( $password==$cpassword){
     $qry=mysql_query("SELECT * FROM login where `username` ='$username' ")or die (mysql_error($db_connect));
    $nrows=mysql_fetch_all($qry);
     if($nrows==null)
      {
     $write =mysql_query("INSERT INTO accountant(`fname`,`lname`,`username`,`phone`,`id`) VALUES ('$fname','$lname','$username','$phone','$dno')") or die(mysql_error($db_connect));

      $writex =mysql_query("INSERT INTO login(`fname`,`lname`,`username`,`phone`,`password`,`type`,`user_code`) VALUES ('$fname','$lname','$username','$phone','$password','$type','$dno')") or die(mysql_error($db_connect));

      if($write && $writex)
         echo " <script>alert('Records Successfully Inserted..');</script>";
     else 
        echo " <script>alert('Something went wrong..');</script>";
      }else{
       echo " <script>alert('Username already exist...');</script>";
      }
   }else
     echo " <script>alert('Password do not match. Please check...');</script>";
     
    }
    //wnd of sdAVE\
include("../../inc/connect.php") ;
    
$query=mysql_query("SELECT id,concat(fname,' ',lname) as name,username,phone FROM accountant")or die (mysql_error($db_connect));
$numrows=mysql_num_rows($query)or die (mysql_error($db_connect));
//echo $numrows; exit;
var_dump($numrows);
$row1=mysql_fetch_all($query);  
function mysql_fetch_all($query) 
{
    $all = array();
    while ($all[] = mysql_fetch_assoc($query)) {$temp=$all;}
    return $temp;
}
//$row1[]=mysql_fetch_assoc($query)or die (mysql_error());
?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Accountant Records
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accounts</a></li>
        <li class="active">Accounts - List</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Accounts</h3>
      </div>
         <div class="box-header">
           <button type="button" class="popup" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-square"></i> Add New</button>
 
</div>
      <div class="modal fade" id="myModal" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register Accountant</h4>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
             <!--    <div class="form-group">
                 <label for="exampleInputEmail1">Doctor</label>
                 <input type="name" class="form-control" name="doctor" placeholder="">
                </div> -->
                <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" name="fname" class="form-control" placeholder="First Name" required="" pattern="[A-Za-z]{1,15}" title="Enter characters only">
               </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" name="lname" class="form-control" placeholder="Last Name" required="" pattern="[A-Za-z]{1,15}" title="Enter characters only">
               </div>
               <div class="form-group">
               <label for="exampleInputEmail1">User Name</label>
               <input type="Email" name="username" class="form-control" placeholder="Email" required="">
              </div>
              <div class="form-group">
              <label for="exampleInputPassword1">Phone</label>
              <input type="text" name="phone" min="1" class="form-control" required="required" pattern="[0-9]{9,12}" title="Enter numerics characters only">
              </div>
               <div class="form-group">
              <label for="exampleInputFile">Password</label>
              <input type="Password" name="password" class="form-control" placeholder="">
              </div> 
               <div class="form-group">
              <label for="exampleInputFile">Confirm Password</label>
              <input type="Password" name="cpassword" class="form-control" placeholder="">
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
  
<!--    <td>
<button type="button" class="btn btn-default">Copy</button>
</td> -->
<td>
<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td>
<div class="box-body">
<table id="example1" class="table table-bordered table-hover">
<thead>
 <tr>
<th>Accountant Id</th>
  <th>Name</th>
  <th>User Name</th>
  <th>Phone</th>
  <th>Option</th>
                  
</tr>
</thead>
<tbody>
<?php 
     foreach ($row1 as $row)
      {

?> <tr>
 
<td><?php echo $row['id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['username'];?></td>
<td><?php echo $row['phone'];?></td>
<td><a href="editaccounts.php?id=<?php echo $row['id']; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a>
 <a href="deleteaccounts.php?id=<?php echo $row['id']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
</tr>
<?php }  ?>
  </tbody>
</table>
</div>
        
        </div>
      </div>       
      </div>
    </section>
  </div>
 <?php include"../Include/footer.php";?>