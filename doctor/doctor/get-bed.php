<?php
include("../../inc/connect.php") ;
if(!empty($_POST["classid"])) 
{
 $cid=$_POST['classid'];
 $oc='0';
 	$inv1 = mysqli_query($conn, "SELECT * FROM `beds` where word='$cid' and occupied='$oc' order by b_id ") or die(mysqli_error());
 	$inv = mysqli_fetch_all($inv1);
	//$amt=$inv['amount'];
?>
<label for = "username">Beds: </label>
							<select name = "bed" class = "form-control" required = "required">
<?php foreach ($inv as $p) {?>
								<option value = "<?php echo $p['0'];?>"><?php echo $p['1'];?></option>
								 <?php } ?>
								 </select>
<?php
 

}
?>