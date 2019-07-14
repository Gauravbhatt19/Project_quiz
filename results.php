<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	$qry="SELECT val_u FROM user_control WHERE name='LOGIN'";
    $result= mysqli_query($conn,$qry) or die(mysqli_error($conn));
    $resultset=mysqli_fetch_assoc($result);
    $check=$resultset['val_u']; 
    if($check!='TRUE'){
      header("location: ./waiting.php");
    }
 if(!isset($_SESSION['tattmpt'])) {
		 header("location: home.php");
	 }
  $atmp =(int)$_SESSION['tattmpt'] ;
       $crrt = (int)$_SESSION['tcorrect'] ;
        $left =(int)$_SESSION['tleft'];
		$id = $_SESSION['id'];
		$last_mod = date('Y-m-d H:i:s');
		$query = "UPDATE users SET tattmpt ='".$atmp."',tcorrect='".$crrt."',tleft='".$left."',last_mod='".$last_mod."' WHERE mbno = '".$id."'";
		echo $query;
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
 		unset($_SESSION['tattmpt']); 
 unset($_SESSION['tcorrect']); 
 unset($_SESSION['tleft']); 
  unset($_SESSION['time_up']); 
 unset($_SESSION['start_time']);
		 header("location: ./home.php"); 
 }
else {
	header("location: ./index.php");
}
?>

