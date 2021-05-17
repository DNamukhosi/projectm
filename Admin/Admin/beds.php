<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
//save values
$row = mysqli_query($conn, "SELECT w_id,name FROM `words` order by w_id") or die(mysqli_error());
  $row1 = mysqli_fetch_all($row);
//session_start();
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['desc'];
     $beds=$_POST['word'];
      $avai="0";
     $id="5";

 $code="BD";
$qq = $conn->query("SELECT * FROM `system_master` where id='$id'") or die(mysqli_error());
$ff = $qq->fetch_array();
$lno=intval($ff['last_no'])+1;
$ln=str_pad($lno, intval($ff['length']), "0", STR_PAD_LEFT);
$dno=$code.$ln;
$write="INSERT INTO `beds`(`b_id`,`name`,`description`,`word`,`occupied`) VALUES ('$dno','$fname','$lname','$beds','$avai')";
$writex =$conn->query($write) or die(mysqli_error());
if($writex)
   { echo " <script>alert('Record Successfully Inserted..');</script>";
   $conn->query("update system_master set last_no=last_no+1 where id='$id'") or die(mysqli_error());}
else 
    echo " <script>alert('Error insering records..');</script>";
}

//$row1[]=mysql_fetch_assoc($query)or die (mysql_error());
?>
<div class="content-wrapper">
    <section class="content-header">  
      <h1>
       MANAGE BEDS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beds</a></li>
        <li class="active">Beds - List</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">BEDS</h3>
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
          <h4 class="modal-title"> Add a Bed</h4>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                <label for="exampleInputEmail1">Bed Name</label>
                <input type="text" name="fname" class="form-control" placeholder="Enter Name" required="required" title="Enter characters only">
               </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="textarea" name="desc" class="form-control" placeholder="Enter Description" required="required"  title="Enter characters only">
               </div>
              <div class="form-group">
             <label for="exampleInputPassword1">Ward</label>
              <select name = "word" class = "form-control" required = "required">
                <?php foreach ($row1 as $p) {?>
                <option value = "<?php echo $p['0'];?>"><?php echo $p['1'];?></option>
                 <?php } ?>
              </select>
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
  <th>Id</th>
  <th>Bed Name</th>
  <th>Ward</th>
  <th>Occupied</th>
  <th>Option</th>
                  
</tr>
</thead>
<tbody>
<?php 
    //wnd of sdAVE\
include("../../inc/connect.php") ;
    
$query=$conn->query("SELECT b_id, beds.name,words.name as word,occupied FROM beds left join words on words.w_id=beds.word order by b_id")or die (mysqli_error());
$numrows=$query->num_rows;
//echo $numrows; exit;
while($row = $query->fetch_array()){
   

?> <tr>
 
<td><?php echo $row['b_id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['word'];?></td>
<td><?php echo $row['occupied'];?></td>
<td><a href="editbeds.php?id=<?php echo $row['b_id']; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a>
 <a href="deleteb.php?id=<?php echo $row['b_id']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
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