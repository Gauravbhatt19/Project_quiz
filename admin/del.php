<?php
session_start();
include "../connection.php";
if(isset($_SESSION['admin'])){
$qno= $_GET['qno'];
$query = "DELETE FROM questions WHERE qno = '$qno' ";
$run = mysqli_query($conn, $query) or die(mysqli_error($conn));	
header("location: allquestions.php");	
}
else
{
	$_SESSION['err']="Please Login First...!";
	header('location: ./index.php');
}

?>