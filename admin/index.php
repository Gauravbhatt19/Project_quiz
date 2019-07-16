<?php
session_start();
include "../connection.php";
if (isset($_SESSION['admin'])) {
	header("location: ./adminhome.php");
}
?>



<html>
	<head>
		<title>Spiders | Quiz</title>  
		<link rel="icon" href="../logo_final.jpg" type="image/jpg">
  	<link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css" >
    <meta name='viewport' content="width=device-width,initial-scale=1.0" />
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
  <a class="navbar-brand ml-5" href="#">ONLINE QUIZ PORTAL</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 text-center">
      <li class="nav-item active">
        <a class="nav-link" href="../">Home <span class="sr-only">(current)</span></a>
      </li>
     </ul>
  </div>
</nav>
<div class="container-fluid mt-2">
	<div class='row '>
 
	<form class='col-lg-8' action='_login.php' method='POST'>
		<div class='border border-dark'> 
<div class='container-fluid text-center bg-secondary text-white p-2'>Login</div>
    <div class='col-lg-4 mb-3'>
      <label for='validationDefaultUsername'>Password</label>
      <div class='input-group'>
        <input type='password' name='pass' class='form-control' id='validationDefaultUsername'  aria-describedby='inputGroupPrepend2'required> 
 </div>

    </div>
    <div class='form-row m-1'>
<?php if (isset($_SESSION['err']))
  echo "<div class='alert alert-warning alert-dismissible fade show m-2' role='alert'>".$_SESSION['err']." <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; ?> 
  </div>
  <button class='btn btn-dark ml-5 m-2' type='submit'>Login</button> 
  <button class='btn btn-light ml-3 m-2' type='reset'>Clear</button>
</div>
</form>
  <?php include "../foot.php"; ?>  
<script src="../bootstrap-4.1.3-dist/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../bootstrap-4.1.3-dist/js/popper.min.js" ></script>
    <script src="../bootstrap-4.1.3-dist/js/bootstrap.min.js" ></script>
</div>
</div>
	</body>
</html>