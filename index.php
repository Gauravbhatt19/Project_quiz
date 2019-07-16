<?php
	session_start();
include "connection.php";
if(isset($_SESSION['id'])){
  header("location: home.php");
}
if (isset($_SESSION['admin'])) {
  $lnk= "location: ./admin/adminhome.php";
 header($lnk);
}
?>

<?php $qry="SELECT val_u FROM user_control WHERE name='REGISTER'";
  	$result= mysqli_query($conn,$qry) or die(mysqli_error($conn));
  	$resultset=mysqli_fetch_assoc($result);
  	$flag1=$resultset['val_u']; 
  	$qry="SELECT val_u FROM user_control WHERE name='LOGIN'";
  	$result= mysqli_query($conn,$qry) or die(mysqli_error($conn));
  	$resultset=mysqli_fetch_assoc($result);
  	$flag2=$resultset['val_u']; 
  	?>
<html>
	<head>
		<title>Spiders | Quiz</title>  
		<link rel="icon" href="./logo_final.jpg" type="image/jpg">
  	<link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.min.css" >
    <meta name='viewport' content="width=device-width,initial-scale=1.0" />
	</head>

	<body>
    <?php
    if(isset($_SESSION['error']))
    {
      echo "<script> alert('".$_SESSION['error']."');</script>";
    }

    ?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand ml-5" href="#">ONLINE QUIZ PORTAL</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 text-center">
      <li class="nav-item active">
        <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if($flag1==='TRUE')
      echo "<li class='nav-item'>
        <a class='nav-link' href='javascript:void(0)'>Register</a>
      </li>"; ?>
     
      <?php if($flag2==='TRUE')
      echo "<li class='nav-item'>
        <a class='nav-link' href='javascript:void(0)'>Login</a>
      </li>"; ?>

    </ul>
  </div>
</nav>
<div class="container-fluid mt-2">
	<div class="card">
  <div class="card-body">
  	<h5>Instructions:</h5>
  	<ol>	
  	<li>First of all Register and ask <span ondblclick="window.location.href='./admin/'">admin</span> to activate your account.</li>
  	<li>The Quiz will start at <b><?php $qry="SELECT val_u FROM user_control WHERE name='TIME'";
  	$result= mysqli_query($conn,$qry) or die(mysqli_error($conn));
  	$resultset=mysqli_fetch_assoc($result);
  	echo $resultset['val_u']; 
  	?> </b>Till then do not close this portal.</li>
  	</ol>
  </div>
</div>
</div>
<div class="container-fluid mt-2">
	<div class='row '>
	<?php if($flag1==='TRUE'){
      echo " 
	<form class='col-lg-8' action='_register.php' method='POST'>
		<div class='border border-dark'> 
<div class='container-fluid text-center bg-secondary text-white p-2'>Register </div>
  <div class='form-row m-1'>
    <div class='col-lg-4 mb-3'>
      <label for='validationDefault01'>First name</label>
      <input type='text' class='form-control' id='validationDefault01' placeholder='First name' name='fname' required>
      		"; 
if (isset($_SESSION['err']))
	echo "<div class='alert alert-warning alert-dismissible fade show m-2' role='alert'>".$_SESSION['err']."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
echo "</div>
    <div class='col-lg-4 mb-3'>
      <label for='validationDefault02'>Last name</label>
      <input type='text' class='form-control' id='validationDefault02' placeholder='Last name' name='lname' required>
      ";
      if (isset($_SESSION['err2']))
	echo "<div class='alert alert-warning alert-dismissible fade show m-2' role='alert'>".$_SESSION['err2']."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
    echo "</div>
    <div class='col-lg-4 mb-3'>
      <label for='validationDefaultUsername'>Mobile No.</label>
      <div class='input-group'>
        <div class='input-group-prepend'>
          <span class='input-group-text' id='inputGroupPrepend2'>+91</span>
        </div>
        <input type='number' name='numb' class='form-control' id='validationDefaultUsername' placeholder='10-digits' aria-describedby='inputGroupPrepend2' min='1000000000' max='9999999999' required>
       ";
      if (isset($_SESSION['err3']))
	echo "<div class='alert alert-warning alert-dismissible fade show m-2' role='alert'>".$_SESSION['err3']."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
    echo "</div>
    </div>
  </div>
  <div class='form-row m-1'>
   <div class='col-lg-6 mb-3'>
      <label for='validationDefaultpass1'>Password</label>
      <div class='input-group'>
        <input type='password' name='pass1' class='form-control' id='validationDefaultpass'  aria-describedby='inputGroupPrepend2' placeholder='Enter Password'  required>";
                         if (isset($_SESSION['err4']))
  echo "<div class='alert alert-warning alert-dismissible fade show m-2' role='alert'>".$_SESSION['err4']."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
echo "</div>
</div>     <div class='col-lg-6 mb-3'>";
      echo "<label for='validationDefaultpass2'>Confirm Password</label>
      <div class='input-group'>
        <input type='password' name='cpass' class='form-control' id='validationDefaultpass2'  aria-describedby='inputGroupPrepend2'  placeholder=' Re Enter Password' required>
        ";
                         if (isset($_SESSION['err5']))
  echo "<div class='alert alert-warning alert-dismissible fade show m-2' role='alert'>".$_SESSION['err5']."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
echo "</div></div></div>
  <button class='btn btn-dark ml-5 m-2' type='submit'>Register</button> 
  <button class='btn btn-light ml-3 m-2' type='reset'>Clear</button>
</div>
</form>";}

if($flag2==='TRUE'){
      echo " 
	<form class='col-lg-4' action='_login.php' method='POST'>
 		<div class=' border border-dark'> 
<div class='container-fluid text-center bg-secondary text-white p-2'>Login</div>
  <div class='form-row m-1'>
    <div class='col-lg-12 mb-3'>
      <label for='validationDefaultUsername'>Mobile No.</label>
      <div class='input-group'>
        <div class='input-group-prepend'>
          <span class='input-group-text' id='inputGroupPrepend2'>+91</span>
        </div>
        <input type='number' name='numb' class='form-control' id='validationDefaultUsername' placeholder='10-digits' aria-describedby='inputGroupPrepend2' min='1000000000' max='9999999999' required> ";
      if (isset($_SESSION['err3']))
  echo "<div class='alert alert-warning alert-dismissible fade show m-2' role='alert'>".$_SESSION['err3']."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
    echo "
      </div>
    </div>
  </div>
  <div class='form-row m-1'>
   <div class='col-lg-12 mb-3'>
      <label for='validationDefaultpass1'>Password</label>
      <div class='input-group'>
        <input type='password' name='pass1' class='form-control' id='validationDefaultpass'  aria-describedby='inputGroupPrepend2' placeholder='Password' required>
        ";
            if (isset($_SESSION['err6']))
  echo "<div class='alert alert-warning alert-dismissible fade show m-2' role='alert'>".$_SESSION['err6']."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
echo"</div></div></div>
  <button class='btn btn-dark ml-5 m-2' type='submit'>Login</button> 
  <button class='btn btn-light ml-3 m-2' type='reset'>Clear</button>
</div>
</form>";}
?>
</div>
</div>
	<?php include "foot.php"; ?>	
<script src="./bootstrap-4.1.3-dist/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="./bootstrap-4.1.3-dist/js/popper.min.js" ></script>
    <script src="./bootstrap-4.1.3-dist/js/bootstrap.min.js" ></script>
</body>
</html>