<?php session_start(); ?>
<?php include "../connection.php";
if (isset($_SESSION['admin'])) {
	?>
<?php 
if (isset($_GET['id'])) {
	$qno = mysqli_real_escape_string($conn , $_GET['id']);
	if (is_numeric($qno)) {
		$query = "SELECT * FROM users WHERE mbno = '$qno' ";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if (mysqli_num_rows($run) > 0) {
			while ($row = mysqli_fetch_assoc($run)) {
				 $mbno = $row['mbno'];
                 $fname = $row['fname'];
                 $lname= $row['lname'];
                 $tattmpt = $row['tattmpt'];
                 $tcorrect = $row['tcorrect'];
                 $tleft = $row['tleft'];
                 $last_mod = $row['last_mod'];
			}
		}
		else {
			echo "<script> alert('error');
			window.location.href = 'players.php'; </script>" ;
		}
	}
	else {
		header("location: players.php");
	}
}

?>
<?php 
if(isset($_POST['submit'])) {
	$fname = htmlentities(mysqli_real_escape_string($conn , $_POST['fname']));
	$lname = htmlentities(mysqli_real_escape_string($conn , $_POST['lname']));
	$tattmpt = htmlentities(mysqli_real_escape_string($conn , $_POST['tattmpt']));
	$tcorrect = htmlentities(mysqli_real_escape_string($conn , $_POST['tcorrect']));
	$tleft = mysqli_real_escape_string($conn , $_POST['tleft']);
  $last_mod = date('Y-m-d H:i:s');
	$query = "UPDATE users SET fname = '$fname' , lname= '$lname' ,last_mod='{$last_mod}' WHERE mbno = '$mbno' ";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Player details successfully updated');
		window.location.href= 'players.php'; </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Spiders | Quiz</title>  
		<link rel="icon" href="../logo_final.jpg" type="image/jpg">
  	<link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css" >
  	 <meta name='viewport' content="width=device-width,initial-scale=1.0" />
	</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
  <a class="navbar-brand mr-5" href="#">ADMIN | QUIZ PORTAL</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
     <li class='nav-item'>
        <a class='nav-link m-2' href='./adminhome.php'>Dashboard</a>
      </li>  
      <li class='nav-item'>
        <a class='nav-link m-2' href='./allquestions.php'>Questions</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link m-2' href='./players.php'>Players</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link m-2' href='./changepass.php'>Change Password</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link btn btn-danger m-2 ' href='javascript:void(0)' 
        onclick="logout()">Logout</a>
        <script type="text/javascript">
          function logout(){
            var test= window.confirm("Are you sure, You want to logout !");
            if(test == true)
              window.location='../_logout.php';
          }
        </script>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid mt-2 mb-3">
	<div class='row '> 
	<form class='col-lg-12' action='' method='POST'>
		<div class='border border-dark'> 
<div class='container-fluid text-center bg-secondary text-white p-2'>Edit Player</div>
  <div class='form-row m-1'>
    <div class='col-lg-12 mb-3'>
      <label for='validationDefault01'>Mobile No.</label>
      <span class='form-control' id='validationDefault01' name="mbno" ><?php echo $mbno; ?></span>
   </div>
   <div class='col-lg-12 mb-3'>
      <label for='validationDefault02'>First Name</label>
      <input type='text' class='form-control' id='validationDefault02' name="fname" value="<?php echo $fname; ?>" required>
    </div>
       <div class='col-lg-12 mb-3'>
      <label for='validationDefault02a'>Last Name</label>
      <input type='text' class='form-control' id='validationDefault02' name="lname" value="<?php echo $lname; ?>" required>
    </div>
       <div class='col-lg-12 mb-3'>
      <label for='validationDefault02b'>Total Attempt</label>
      <span class='form-control' id='validationDefault02b' name="tattmpt" ><?php echo $tattmpt; ?></span>
    </div>
       <div class='col-lg-12 mb-3'>
      <label for='validationDefault02c'>Total Correct</label>
      <span class='form-control' id='validationDefault02c' name="tcorrect"><?php echo $tcorrect; ?></span>
    </div>
    <div class='col-lg-12 mb-3'>
      <label for='validationDefault02d'>Total Left</label>
      <span class='form-control' id='validationDefault02d' name="tleft" ><?php echo $tleft; ?></span>
    </div>
        <div class='col-lg-12 mb-3'>
      <label for='validationDefault01a'>Last Modified Time</label>
      <span class='form-control' id='validationDefault01a' name="last_mod" ><?php echo $last_mod; ?></span>
   </div>
     <button class='btn btn-dark ml-5 m-2' type='submit' name="submit">Update</button> 
  <a class='btn btn-light ml-5 m-2' href='./players.php'>Back</a> 
</div>
</div>
</form>
</div>
 </div> <?php include "../foot.php"; ?>  
<script src="../bootstrap-4.1.3-dist/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../bootstrap-4.1.3-dist/js/popper.min.js" ></script>
    <script src="../bootstrap-4.1.3-dist/js/bootstrap.min.js" ></script>
				
	</body>
</html>








<?php } 
else {
	header("location: admin.php");
}
?>