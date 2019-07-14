<?php
session_start();
if(!(isset($_SESSION['admin'])))
{	
	header("location: ./index.php");
	session_destroy();
}
include '../connection.php';
$cpass=mysqli_escape_string($conn,$_POST['cpass']);
$npass=mysqli_escape_string($conn,$_POST['npass']);
$pass=mysqli_escape_string($conn,$_POST['cnfrmpass']);
if($pass!=$npass)
{	echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Confirm Password and password entered is not same ...!' );
    window.location = './changepass.php';},0);
	</script>";}
else
{
$qry="SELECT val_u FROM user_control WHERE name='PASS'";	
$result=mysqli_query($conn,$qry);
 $result_id = $result->fetch_assoc();
if(password_verify($cpass,$result_id['val_u']))
{     $pass=password_hash($pass,PASSWORD_DEFAULT);
 $qry="UPDATE user_control SET val_u='$pass' WHERE name='PASS'";	
$result=mysqli_query($conn,$qry); 
	echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Password Succesfully Changed.!' );
    window.location = './adminhome.php';},0);
	</script>";}
  else {
   echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Invalid Password...! Try again.!' );
    window.location = './changepass.php';},0);
	</script>";
	 }
}
?>