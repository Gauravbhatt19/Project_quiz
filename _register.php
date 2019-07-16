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
if (!isset($_POST['fname'])) {
$_SESSION['err']='PLEASE ENTER VALID FIRST NAME..!';
$flg=0;
}
if (!isset($_POST['lname'])) {
$_SESSION['err2']='PLEASE ENTER VALID LAST NAME..!';
$flg=0;
}
if (!isset($_POST['pass1'])) {
$_SESSION['err4']='PLEASE ENTER VALID PASSWORD..!';
$flg=0;
}
if (!isset($_POST['cpass'])) {
$_SESSION['err5']='PLEASE ENTER VALID CONFIRM PASSWORD..!';
$flg=0;
}
if($_POST['pass1']!==$_POST['cpass']){
	$_SESSION['err5']='CONFIRM PASSWORD DOESN\'T MATCHES WITH PASSWORD, TRY AGAIN..!';
$flg=0;
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
	$fname=mysqli_escape_string($conn,$_POST['fname']);
	$lname=mysqli_escape_string($conn,$_POST['lname']);
	$numb=mysqli_escape_string($conn,$_POST['numb']);
	$cpass=mysqli_escape_string($conn,$_POST['cpass']);
	$pass=password_hash($cpass,PASSWORD_DEFAULT);
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
		$_SESSION['success']="You have already Registered..!";
		header("location: home.php");
	}
		else {
		$last_mod = date('Y-m-d H:i:s');
	$query = "INSERT INTO users(mbno,fname,lname,last_mod,pass) VALUES ('$numb','$fname','$lname','$last_mod','$pass')";
	$run = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
	if (mysqli_affected_rows($conn) > 0) {
		$query2 = "SELECT * FROM users WHERE mbno = '$numb' ";
		$run2 = mysqli_query($conn , $query2) or die(mysqli_error($conn));
		if (mysqli_num_rows($run2) > 0) {
			$row = mysqli_fetch_array($run2);
			$id = $row['mbno'];
			$_SESSION['id'] = $id;
			$_SESSION['name'] = $row['fname'].' '.$row['lname'];
			$_SESSION['success']="New User ! Successfully Registered..";
			header("location: home.php");
		}
	else {
		$_SESSION['error']='SOMETHING WENT WRONG..! TRY AGAIN';
		header('location: ./index.php');
	}
}
}
}
?>
