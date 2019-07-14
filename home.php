<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
$qry="SELECT val_u FROM user_control WHERE name='LOGIN'";
    $result= mysqli_query($conn,$qry) or die(mysqli_error($conn));
    $resultset=mysqli_fetch_assoc($result);
    $check=$resultset['val_u']; 
    if($check!='TRUE'){
      header("location: ./waiting.php");
    }
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
  <a class="navbar-brand mr-5" href="#">ONLINE QUIZ PORTAL</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
     <li class='nav-item'>
        <a class='nav-link btn btn-info text-dark m-2' href='./players.php'>Scoreboard</a>
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
        <?php
        $id=$_SESSION['id'];
        $query = "SELECT * FROM users WHERE mbno = '$id'";
       $run = mysqli_query($conn , $query) or die(mysqli_error($conn));
       $result=mysqli_fetch_assoc($run);
       if (($result['tattmpt']+$result['tcorrect']+$result['tleft']) > 0){
       echo "<div class='container-fluid mt-2 mb-5'>
  <div class='card'>
  <div class='card-body'>
    <h5>Hi, ";
    echo $_SESSION['name'];
    echo "</h5>
    <h5>Congratulations!</h5>
    <p>You have successfully completed the test</p>
    <ul>
            ";
     $atmp =$result['tattmpt'] ;
       $crrt = $result['tcorrect'] ;
        $left =$result['tleft'];
    echo "
 <li><strong>Total attempt: </strong>"; 
 echo $atmp; 
    echo "</li>  <li><strong>Total correct: </strong>";
 echo $crrt;

    echo "</li>  <li><strong>Total incorrect: </strong>";
    echo  $atmp-$crrt; 
    echo "</li> <li><strong>Total left: </strong>";  
 echo $left; 
    echo "</li>  <li><strong>To see your rank Kindly visit scoreboard from menu.</strong></li> 
        
        </ul>  </div>
</div>
</div>";}
else {
		echo "<div class='container-fluid mt-2 mb-5'>
	<div class='card'>
  <div class='card-body'>
  	<h5>Hi, ";
     echo $_SESSION['name']; echo "</h5>
  	<h5>Welcome to Quiz !</h5>
  	<p>This is just a simple quiz game to test your knowledge!</p>
  	<ul>	    
 <li><strong>Number of questions: </strong>"; 
 echo $total; echo "</li> 
				 <li><strong>Type: </strong>Multiple Choice</li> 
				     <li><strong>Estimated time for each question: </strong>";  
				   echo 10; echo " seconds</li>
             <li><strong>Score: </strong><br/>&#1240; +1 point for each correct answer
             <br/>&#1240; no negative point for incorrect answer<br/>
             &#1240; if time's up the answer will be considered as incorrect</li>
				</ul>
				<a href='question.php?n=1' class='btn btn-info'>Start Quiz</a>  </div>
</div>
</div>";
}?>
		<?php include "foot.php"; ?>
		<script src="./bootstrap-4.1.3-dist/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="./bootstrap-4.1.3-dist/js/popper.min.js" ></script>
    <script src="./bootstrap-4.1.3-dist/js/bootstrap.min.js" ></script>
	</body>
</html>
<?php 
 }
 else {
header("location: index.php");
 }
?>

