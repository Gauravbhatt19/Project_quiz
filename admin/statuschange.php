<?php
session_start();
if (isset($_SESSION['admin'])) {
include "../connection.php";
$val=$_GET['val'];
$id=$_GET['id'];
if ($id=='QUIZ'){
$qry="UPDATE user_control SET val_u='TRUE' WHERE name='LOGIN'"; 
$result=mysqli_query($conn,$qry); 
}
if ($id=='LOGIN'){
$qry="UPDATE user_control SET val_u='FALSE' WHERE name='QUIZ'"; 
$result=mysqli_query($conn,$qry); 
}
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