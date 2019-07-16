<?php
session_start();
if(!(isset($_SESSION['id'])))
{	
	header("location: ./index.php");
	session_destroy();
}
include './connection.php';
$id=$_SESSION['id'];
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
$qry="SELECT * FROM users WHERE mbno='$id'";	
$result=mysqli_query($conn,$qry);
 $result_id = $result->fetch_assoc();
if(password_verify($cpass,$result_id['pass']))
{     $pass=password_hash($pass,PASSWORD_DEFAULT);
 $qry="UPDATE users SET pass='$pass' WHERE mbno='$id'";	
$result=mysqli_query($conn,$qry); 
	echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Password Succesfully Changed.!' );
    window.location = './home.php';},0);
	</script>";}
  else {
   echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Invalid Password...! Try again.!' );
    window.location = './changepass.php';},0);
	</script>";
	 }
}
?>