<?php
session_start();
if(!(isset($_SESSION['id'])))
{	
    session_destroy();
	header("location: ./index.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Spiders | Quiz</title>  
    <link rel="icon" href="./logo_final.jpg" type="image/jpg">
    <link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.min.css" >
     <meta name='viewport' content="width=device-width,initial-scale=1.0" />
   </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
  <a class="navbar-brand mr-5" href="#">ONLINE QUIZ PORTAL</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class='nav-item'>
        <a class='nav-link m-2' href='./home.php'>Home</a>
      </li>
     <li class='nav-item'>
        <a class='nav-link m-2' href='./players.php'>Scoreboard</a>
      </li>     
      <li class='nav-item'>
        <a class='nav-link btn btn-danger m-2 ' href='javascript:void(0)' 
        onclick="logout()">Logout</a>
        <script type="text/javascript">
          function logout(){
            var test= window.confirm("Are you sure, You want to logout !");
            if(test == true)
              window.location='./_logout.php';
          }
        </script>
      </li>
    </ul>
  </div>
</nav>
    <div class="container">  
      <div class="card m-2">
    <h5 class="card-title text-center bg-secondary text-white p-2">Change Password</h5>
<form action='_chngepass.php' method="POST" class="m-3">
  <div class="form-row">
      <label  class="my-1 mr-2" for='cpass'>Current Password</label>
      <input type="Password" class="form-control my-1 mr-sm-2" name="cpass" id='cpass' placeholder="Current Password" required>
      </div>
  <div class="form-row">
      <label  class="my-1 mr-2" for='npass'>New Password</label>
      <input type="Password" class="form-control my-1 mr-sm-2" name="npass" id='npass' placeholder="New Password" required>
      </div>
  <div class="form-row">
      <label  class="my-1 mr-2" for='cnfrmpass'>Confirm Password</label>
      <input type="Password" class="form-control my-1 mr-sm-2" name="cnfrmpass" id='cnfrmpass' placeholder="Confirm Password" required>
      </div>
  <div class="form-row">
     <button type="submit" class="btn btn-primary btn-block custom-pad">Change Password</button>  
  </div>
</form>
</div>
</div> 

    <?php include "foot.php"; ?>
    <script src="./bootstrap-4.1.3-dist/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="./bootstrap-4.1.3-dist/js/popper.min.js" ></script>
    <script src="./bootstrap-4.1.3-dist/js/bootstrap.min.js" ></script>
</body>
</html>
