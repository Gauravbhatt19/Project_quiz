<?php 
session_start();
session_destroy(); 
session_start();
?>
<?php
 include "../connection.php";
if (!isset($_POST['pass'])) {
$_SESSION['err']='Please Enter a Valid Password..!';
		header('location:./index.php');
}
else
{
	$pass=mysqli_escape_string($conn,$_POST['pass']);
    $checkmail = "SELECT val_u from user_control WHERE name = 'PASS'";
    $runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
    	if (mysqli_num_rows($runcheck) <= 0) {
		$_SESSION['err']='Admin Not Registered Yet..!';
		header('location:./index.php');
	}
		else{
		$row = mysqli_fetch_assoc($runcheck);
		$pass = $row['val_u'];
		$etps= $_POST['pass'];
		if(password_verify($etps,$pass)){
		$_SESSION['admin'] = 'logged in';
		header("location: ./adminhome.php");
	}
		else {
		$_SESSION['err']='Wrong Attempt ! Please Enter a Correct Password..!';
		header('location:./index.php');
	}
}
}

?>
