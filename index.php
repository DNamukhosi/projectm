
<?php
session_start();
  include("inc/connect.php") ;

if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=md5($_POST['password']);
//$user_id=$_POST['user_id'];
//$passwordenc=md5($_POST['password']);
//echo$password; exit();
//if($user_id)
//{
if($username && $password)
{
	$qry = $conn->query("SELECT * FROM `sys_user` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
      $fetch = $qry->fetch_array();
		$isValid = $qry->num_rows;
		$level = $fetch['level'];
 	   if($isValid > 0){
	   {
			if($level=="1"){
				$query = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
				$fetch = $query->fetch_array();
				$isValid=$query->num_rows;
				if($isValid>0){
					$_SESSION['admin_id'] =$fetch['admin_id'];
					header("location: admin/admin/index.php");

				}else{
					echo "<script>alert('Invalid Admin username or password')</script>";
					echo "<script>window.location = 'index.php'</script>";
				}
			}else if($level=="2"){
				$query = $conn->query("SELECT * FROM `doctors` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
				$fetch = $query->fetch_array();
				$isValid=$query->num_rows;
				if($isValid>0){
					$_SESSION['d_id']=$fetch['d_id'];
					header("location: doctor/doctor/index.php");

				}else{
					echo "<script>alert('Invalid Doctor username or password')</script>";
					echo "<script>window.location = 'index.php'</script>";
				}
			}
			else if($level=="3"){
				$query = $conn->query("SELECT * FROM `nurses` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
				$fetch = $query->fetch_array();
				$isValid=$query->num_rows;
				if($isValid>0){
					$_SESSION['n_id']=$fetch['n_id'];
					header("location: nurse/nurse/index.php");

				}else{
					echo "<script>alert('Invalid Attendant username or password')</script>";
					echo "<script>window.location = 'index.php'</script>";
				}
			}else{
				echo "<script>alert('Invalid username TYPE')</script>";
							echo "<script>window.location = 'index.php'</script>";
			}

		}
		}
	}
}
else
{
	session_destroy();
}

?>


<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Mathari IMS| Login</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "images/logo.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css1/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css1/customize.css" />
	</head>
<body>
	<meta charset = "utf-8" />
<link rel = "shortcut icon" href = "images/logo.jpg">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css1" />
<link rel = "stylesheet" type = "text/css" href = "css/customize.css1" />

<div class = "navbar navbar-default navtop">
		<img src = "images/logo.jpg" style = "float:left;" height = "55px" /><label class = "navbar-brand">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MATHARI HOSPITAL</label>
		
			
</div>
		<div id = "sidelogin">
			<form  enctype = "multipart/form-data" method = "POST" >
				<label class = "lbllogin">User Login</label>
				<hr /style = "border:1px dotted #000;">
				<div class = "form-group">
					<label for = "username">Username</label>
					<input class = "form-control" type = "text" name = "username"  required = "required"/>
				</div>
				<div class = "form-group">
					<label for = "password">Password</label>
					<input class = "form-control" type = "password" name = "password" required = "required" />
				</div>
				<div class = "form-group">
					<button class  = "btn btn-success form-control" type = "submit" name = "login" ></span> Login</button>
				</div>
			</form>
	 </div>
		</div>	
		<img src = "images/victorias.jpg" class = "background">	
			
</body>
<?php
	include("script.php");
?>
</html>