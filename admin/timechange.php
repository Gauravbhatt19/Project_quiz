<?php
session_start();
if (isset($_SESSION['admin'])) {
$val=$_GET['val'];
$id='TIME';
include "../connection.php";
$qry="UPDATE user_control SET val_u='$val' WHERE name='$id'"; 
$result=mysqli_query($conn,$qry); 
header("location: adminhome.php");
}
else
{
		$_SESSION['err']="Please Login First...!";
	header('location: ./index.php');
}
?>