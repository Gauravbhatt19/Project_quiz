<?php
session_start();
include "../connection.php";
if(isset($_SESSION['admin'])){
$mbno= $_GET['id'];
$pass= 'AbCdEf@123#654';
$pass=password_hash($pass,PASSWORD_DEFAULT);
 $last_mod = date('Y-m-d H:i:s');
	$query = "UPDATE users SET pass='{$pass}' ,last_mod='{$last_mod}' WHERE mbno = '$mbno' ";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Player\'s password reset to AbCdEf@123#654');
		window.location.href= 'players.php'; </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}
else
{
	$_SESSION['err']="Please Login First...!";
	header('location: ./index.php');
}

?>