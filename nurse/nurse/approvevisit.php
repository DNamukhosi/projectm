<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
//error_reporting(0);
$find=" order by p_id limit 0";
//book appointment
$vis="0";
//save visitor
if(isset($_POST['submit']))
{
    $fname=$_POST['id'];
    //$vname=$_POST['mname'];
     $pname=$_POST['name'];

  $vis = $conn->query("SELECT * FROM `p_visitor` where phone_no='$fname'") or die(mysqli_error());
$vis1 = $vis->fetch_array();

$isValid=$vis->num_rows;
if($isValid>0)
{
   $ad="1";
   $pis = $conn->query("SELECT * FROM p_medication where name like '%$pname%' and admitted='$ad' and discharged<>'$ad'") or die(mysqli_error());
  $pis1 = $pis->fetch_array();

 $pisValid=$pis->num_rows;
 if($pisValid>0)
 {
            $find="where name like '%$pname%' and admitted='$ad' and discharged<>'$ad'";
            $_SESSION['vis']= $fname;
            $vis=$fname;
  }
  else
  {
     echo " <script>alert('Patient does not exist or is discharged. Kindly Check!!!');</script>";
  } 
}
else
{
   echo " <script>alert('Visitor Not registed. Kindly Check..');</script>";
}   
}
//$row1[]=mysql_fetch_assoc($query)or die (mysql_error());
?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
       APPROVE VISITS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Approve Visitors</a></li>
        <li class="active">Visitors - List</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">APPROVE VISITORS</h3>
      </div>
         <div class="box-header">
            <form method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                <label for="exampleInputEmail1">Visitor Phone</label>
                <input type="text" name="id" class="form-control" placeholder="Enter Phone Number" onmouseleave="getAmt(this.value);" required="required">
               </div>
                <div id="subject">
              
              
            </div>
               <div class="form-group">
                <label for="exampleInputEmail1">Patient Name</label>
                <input type="text" name="name" class="form-control" placeholder="Patients Name" required="required">
               </div>
                                        
           <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-primary">Find</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         </div>
        
      </form>
</div>

<div class="box-body">
<table id="example1" class="table table-bordered table-hover">
<thead>
 <tr class="header">
  <th>P.ID</th>
  <th>Name</th>
  <th>Bed</th>
  <th>Ward</th>
  <th>Doctors</th>
  <th>Option</th>
                  
</tr>
</thead>
<tbody>
<?php 
    //wnd of sdAVE\
include("../../inc/connect.php") ;
    
$query=$conn->query("SELECT p_id,name,ward,bed,d_id FROM `p_medication` ".$find." ")or die (mysqli_error());
$numrows=$query->num_rows;
//echo $numrows; exit;
while($row = $query->fetch_array()){
   
$bd=$conn->query("select name from beds where b_id='$row[bed]'")or die (mysqli_error());
$bed = $bd->fetch_array();

$wd=$conn->query("select name from words where w_id='$row[ward]'")or die (mysqli_error());
$ward = $wd->fetch_array();

$do=$conn->query("select concat(firstname,' ',middlename,' ',lastname) as name from doctors where d_id='$row[d_id]'")or die (mysqli_error());
$doc = $do->fetch_array();

?> <tr>
 
<td><?php echo $row['p_id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $bed['name'];?></td>
<td><?php echo $ward['name'];?></td>
<td><?php echo $doc['name'];?></td>
<td>

 <a href="approve.php?id=<?php echo $row['p_id'] ?>&vis=<?php echo $vis;?>" ><span class="btn btn-success bg-blue"><i class="fa fa-info"></i> Appove </span></a>
</td>
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
  <script>
  function getAmt(val) {
    $.ajax({
    type: "POST",
    url: "get-visitor.php",
    data:'classid='+val,
    success: function(data){
        $("#subject").html(data);
        
    }
    });
    }
</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("example1");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

 <?php include"../Include/footer.php";?>