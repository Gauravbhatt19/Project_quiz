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
if (!isset($_POST['pass1'])) {
$_SESSION['err6']='PLEASE ENTER VALID PASSWORD..!';
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
    $result=mysqli_fetch_assoc($runcheck);
    $pass=$result['pass'];
    $epswd=$_POST['pass1'];
    	if ((mysqli_num_rows($runcheck) > 0) and password_verify($epswd,$pass)) {
		$last_mod = date('Y-m-d H:i:s');
		$update = "UPDATE users SET last_mod = '$last_mod' WHERE mbno = '$numb' ";
		$runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
		$id = $result['mbno'];
		$_SESSION['id'] = $id;
		$_SESSION['name'] = $result['fname'].' '.$result['lname'];
		header("location: home.php");
	}
		else {
		$_SESSION['error']='Invalid Mobile No. or Password .! TRY AGAIN';
		header('location: ./index.php');
	}
}
?>
