<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
//save values
//session_start();


//$row1[]=mysql_fetch_assoc($query)or die (mysql_error());
?>
<div class="content-wrapper">
    <section class="content-header">  
      <h1>
       MANAGE WORDS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Words</a></li>
        <li class="active">Word - List</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">WORDS</h3>
      </div>
         <div class="box-header">
          <button type="button" onclick="window.print();" class="btn btn-print"> Print</button>
</div>
      
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
<td>

</td>
<div class="box-body">
<table id="example1" class="table table-bordered table-hover">
<thead>
 <tr>
  <th>Id</th>
  <th>Word Name</th>
  <th>Capacity</th>
  <th>Available</th>
  <th>Option</th>
                  
</tr>
</thead>
<tbody>
<?php 
    //wnd of sdAVE\
include("../../inc/connect.php") ;
    
$query=$conn->query("SELECT w_id, name,capacity,available FROM words order by w_id")or die (mysqli_error());
$numrows=$query->num_rows;
//echo $numrows; exit;
while($row = $query->fetch_array()){
   

?> <tr>
 
<td><?php echo $row['w_id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['capacity'];?></td>
<td><?php echo $row['available'];?></td>
<td>
 <a href="beds.php?id=<?php echo $row['w_id']; ?>"><span class="btn btn-success bg-blue"><i class="fa fa-cog"></i> View Details </span></a></td>
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