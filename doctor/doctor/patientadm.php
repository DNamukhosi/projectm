<?php 

include"../Include/header.php";
include"../Include/sidebar.php";
//save value
//$row1[]=mysql_fetch_assoc($query)or die (mysql_error());
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       MANAGE ADMITTED PATIENTS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Admitted Patients</a></li>
        <li class="active">Admitted Patients - List</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">PATIENTS</h3>
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
  <th>Ward</th>
   <th>Bed</th>
  <th>Option</th>
                  
</tr>
</thead>
<tbody>
<?php 
    //wnd of sdAVE\
include("../../inc/connect.php") ;
    $ddt = date("Y-m-d");
    $tt="1";
$query=$conn->query("SELECT distinct(p_medication.p_id),p_medication.name,bed,ward,patients.phone_no,patients.gender FROM `p_medication` left join patients on patients.p_id=p_medication.p_id  where admitted='$tt' and discharged <>'$tt' order by p_medication.p_id")or die (mysqli_error());
$numrows=$query->num_rows;
//echo $numrows; exit;
while($row = $query->fetch_array()){
   $qry=$conn->query("SELECT * FROM `beds`  where b_id='$row[bed]'")or die (mysqli_error());
    $bd=$qry->fetch_array();
     $qy=$conn->query("SELECT * FROM `words`  where w_id='$row[ward]'")or die (mysqli_error());
    $wo=$qy->fetch_array();

?> <tr>
 
<td><?php echo $row['p_id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['phone_no'];?></td>
<td><?php echo $bd['name'];?></td>
<td><?php echo $wo['name'];?></td>
<td>
  <a href="info.php?id=<?php echo $row['p_id']; ?>"><span class="btn btn-success bg-green"><i class="fa fa-info"></i> Info</span></a>
  <a href="medicationadm.php?id=<?php echo $row['p_id']; ?>"><span class="btn btn-success bg-orange"><i class="fa fa-edit"></i> Treatment</span></a>
  <a href="patapp.php?id=<?php echo $row['p_id']; ?>" ><span class="btn btn-success bg-blue"><i class="fa fa-info"></i> Appointment </span></a>
  
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