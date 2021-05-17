<?php
include("../../inc/connect.php") ;
if(!empty($_POST["classid"])) 
{
 $cid=$_POST['classid'];
 $oc='0';
 	$inv1 = mysqli_query($conn, "SELECT * FROM `v_appointments` where phone_no='$cid' ") or die(mysqli_error());
 	$inv=$inv1->fetch_array();
	//$amt=$inv['amount'];
?>
<label for = "username">Visitor Name: </label>
<input type="text" name="mname" class="form-control" value = "<?php echo $inv['name'];?>">
	
<?php
 

}
?>