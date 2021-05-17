<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
//save values


//$row1[]=mysql_fetch_assoc($query)or die (mysql_error());
?>
<div class="content-wrapper">
    <section class="content-header">  
      <h1>
       VIEW BEDS
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
  <th>Bed Name</th>  
  <th>Word</th>
  <th>Occupied</th>
   <th>Occupied By</th>
                  
</tr>
</thead>
<tbody>
<?php 
    //wnd of sdAVE\
include("../../inc/connect.php") ;
    
$query=$conn->query("SELECT b_id, beds.name,words.name as word,occupied FROM beds left join words on words.w_id=beds.word where word='$_GET[id]' order by b_id")or die (mysqli_error());
$numrows=$query->num_rows;
//echo $numrows; exit;
while($row = $query->fetch_array()){
   $qry=$conn->query("SELECT name  FROM bed_trans where bed='$row[b_id]'")or die (mysqli_error());
$rw = $qry->fetch_array();
$acc="";
 if($row['occupied']=="1")
 $acc="Occupied";
 else
   $acc="Not Occupied";
?> <tr>
 
<td><?php echo $row['b_id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['word'];?></td>
<td><?php echo $acc;?></td>
<td><?php echo $rw['name'];?></td>

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