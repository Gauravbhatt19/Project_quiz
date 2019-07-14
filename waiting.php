<?php
if(!isset($_SESSION))
	session_start();
include "connection.php";
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
   if(isset($_SESSION['success']))
    {
      echo "<script> alert('".$_SESSION['success']."');</script>";
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
      </li>    </ul>
  </div>
</nav>

<div class="container-fluid mt-2">
	 <div class="card mb-5">
  <div class="card-body">
    <?php
        $qry="SELECT val_u FROM user_control WHERE name='LOGIN'";
    $result= mysqli_query($conn,$qry) or die(mysqli_error($conn));
    $resultset=mysqli_fetch_assoc($result);
    $check=$resultset['val_u']; 
    if($check=='TRUE'){
      header("location: ./home.php");
    }
    else{
      echo "<h2>You are landed in this page because quiz is not started yet. Asked admin to start Quiz. <a href='./' >Click on me to go to home Page.</a></h2>";
    }

?>
  </div>
</div>
</div>
	<?php include "foot.php"; ?>	
<script src="./bootstrap-4.1.3-dist/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="./bootstrap-4.1.3-dist/js/popper.min.js" ></script>
    <script src="./bootstrap-4.1.3-dist/js/bootstrap.min.js" ></script>
</body>
</html>