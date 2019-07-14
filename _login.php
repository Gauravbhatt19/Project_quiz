<?php 
session_start();
session_destroy(); 
session_start();
?>
<?php
 include "connection.php";
$flg=1;
function validate_mobile($mobile)
{   if(preg_match('/^[0-9]{10}+$/', $mobile)==1)
    return False;
    else
    	return True;
}
if (!isset($_POST['numb']) or validate_mobile($_POST['numb'])) {
$_SESSION['err3']='PLEASE ENTER VALID NUMBER..!';
$flg=0;
}
if($flg==0)
{
		header('location:./index.php');
}
else
{
	$numb=mysqli_escape_string($conn,$_POST['numb']);
    $checkmail = "SELECT * from users WHERE mbno = '$numb'";
    $runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
    	if (mysqli_num_rows($runcheck) > 0) {
		$last_mod = date('Y-m-d H:i:s');
		$update = "UPDATE users SET last_mod = '$last_mod' WHERE mbno = '$numb' ";
		$runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($runcheck);
		$id = $row['mbno'];
		$_SESSION['id'] = $id;
		$_SESSION['name'] = $row['fname'].' '.$row['lname'];
		header("location: home.php");
	}
		else {
		$_SESSION['error']='Invalid Mobile No..! TRY AGAIN';
		header('location: ./index.php');
	}
}
?>
