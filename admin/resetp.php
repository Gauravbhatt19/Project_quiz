<?php
session_start();
include "../connection.php";
if(isset($_SESSION['admin'])){
$mbno= $_GET['id'];
$tattmpt = '0';
                 $tcorrect = '0';
                 $tleft = '0';
 $last_mod = date('Y-m-d H:i:s');
	$query = "UPDATE users SET tattmpt = '$tattmpt' , tcorrect = '$tcorrect' , tleft = '$tleft' ,last_mod='{$last_mod}' WHERE mbno = '$mbno' ";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Player details successfully reset');
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