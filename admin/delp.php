<?php
session_start();
include "../connection.php";
if(isset($_SESSION['admin'])){
$qno= $_GET['id'];
$query = "DELETE FROM users WHERE mbno = '$qno' ";
$run = mysqli_query($conn, $query) or die(mysqli_error($conn));	
header("location: players.php");	
}
else
{
	$_SESSION['err']="Please Login First...!";
	header('location: ./index.php');
}

?>