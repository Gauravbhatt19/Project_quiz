<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	$qry="SELECT val_u FROM user_control WHERE name='LOGIN'";
    $result= mysqli_query($conn,$qry) or die(mysqli_error($conn));
    $resultset=mysqli_fetch_assoc($result);
    $check=$resultset['val_u']; 
    if($check!='TRUE'){
      header("location: ./waiting.php");
    }
    $qry1="SELECT val_u FROM user_control WHERE name='QUIZ'";
    $result1= mysqli_query($conn,$qry1) or die(mysqli_error($conn));
    $resultset1=mysqli_fetch_assoc($result1);
    $check1=$resultset1['val_u']; 
    if($check1!='TRUE'){
   		$_SESSION['success']='Quiz is not started yet..!';
      header("location: ./home.php");
	}
	if (isset($_GET['n']) && is_numeric($_GET['n'])) {
	        $qno = $_GET['n'];
	        if ($qno == 1) {
	        	$_SESSION['quiz'] = 1;
	        }
	        }
	        else {
	        	header('location: question.php?n='.$_SESSION['quiz']);
	        } 
	        if (isset($_SESSION['quiz']) && $_SESSION['quiz'] == $qno) {
			$query = "SELECT * FROM questions WHERE qno = '$qno'" ;
			$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
			if (mysqli_num_rows($run) > 0) {
				$row = mysqli_fetch_array($run);
				$qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
                 $_SESSION['quiz'] = $qno;
                 $checkqsn = "SELECT * FROM questions" ;
                 $runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
                 $countqsn = mysqli_num_rows($runcheck);
                 $time = time();
                 $_SESSION['start_time'] = $time;
                 $allowed_time = 9;
                 $_SESSION['time_up'] = $_SESSION['start_time'] + $allowed_time;
                }
			else {
				echo "<script> alert('something went wrong');
			window.location.href = 'home.php'; </script> " ;
			}
		}
		else {
		echo "<script> alert('error');
			window.location.href = 'home.php'; </script> " ;
	}
?>
<?php 
$total = "SELECT * FROM questions ";
$run = mysqli_query($conn , $total) or die(mysqli_error($conn));
$totalqn = mysqli_num_rows($run);

?>
<html>
	<head>
			<title>Spiders | Quiz</title>  
		<link rel="icon" href="./logo_final.jpg" type="image/jpg">
  	<link rel="stylesheet" href="./bootstrap-4.1.3-dist/css/bootstrap.min.css" >
    <meta name='viewport' content="width=device-width,initial-scale=1.0" />
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand mr-5" href="#">ONLINE QUIZ PORTAL</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
     <li class='nav-item'>
        <a class='nav-link btn btn-info text-dark m-2' href='./results.php'>Quit</a>
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
        <style type="text/css">
        	.blk{
	animation-iteration-count:infinite;
	animation-duration:0.5s; 
	animation-timing-function:linear; 
	position:relative; 
	z-index:0; 
        		}
        		.blink2
{
	animation-name:myan;
}     
@keyframes myan
	{
		0%{margin-left:1.5em;}
		50%{margin-left:1em;}
		100%{margin-left:1.5em;}
	}
        		.blink1
{
	animation-name:myani;
}     
@keyframes myani
	{
		0%{margin-left:2em;}
		50%{margin-left:1em;}
		100%{margin-left:2em;}
	}       		
	
   		.blink
{
	animation-name:myanim;
}
	@keyframes myanim
	{
		0%{margin-left:1.5em;}
		25%{margin-left:1em;}
		50%{margin-left:1.5em;}
		75%{margin-left:1em;}
		100%{margin-left:1.5em;}
	}

        </style>
      </li>
    </ul>
  </div>
</nav>
		<div class="container-fluid mt-2 mb-5">
	<div class="card">
  <div class="card-body">
  	<h5>Question <?php echo $qno; ?> of <?php echo $totalqn; ?></h5>
  	<h5><?php echo $question; ?></h5>
  	<script>
  		var y=9;
  		var x = setInterval(function() {
  document.getElementById("chnge").innerHTML = y + " Seconds Left";
  y=y-1;
  if (y<8){

  	  document.getElementById("chnge").classList.add('blink1');
  	  document.getElementById("chnge").classList.add('text-warning');
  }  
  if (y<5){
  	  document.getElementById("chnge").classList.add('text-danger');
  	  document.getElementById("chnge").classList.add('blink');
  }
  if (y<0) {
    document.getElementById('sub').click();
    clearInterval(x);
   }
}, 1000);
</script>
  	<p>Time: <b id='chnge' class="text-primary blk blink2">10 Seconds Left</b></p>
  	<form method="post" action="process.php">
  		<input type="radio" name="choice"  value="0" class="d-none" checked>
					<div class="list-group">
  <button type="button" class="list-group-item list-group-item-action">
    <div class="form-check">
  <input class="form-check-input" type="radio" name="choice"  value="a"  id="exampleRadios1" >
  <label class="form-check-label" for="exampleRadios1">
    <?php echo $ans1; ?>
  </label>
</div>
  </button>
  <button type="button" class="list-group-item list-group-item-action">
  	  <div class="form-check"><input class="form-check-input" type="radio" name="choice"  value="b"  id="exampleRadios2" >
  <label class="form-check-label" for="exampleRadios2">
   <?php echo $ans2; ?> </label>
</div>
</button>  <button type="button" class="list-group-item list-group-item-action">
  	  <div class="form-check"><input class="form-check-input" type="radio" name="choice" value="c"  id="exampleRadios3" >
  <label class="form-check-label" for="exampleRadios3">
   <?php echo $ans3; ?> </label>
</div>
</button>  <button type="button" class="list-group-item list-group-item-action">
  	  <div class="form-check"><input class="form-check-input" type="radio" name="choice" value="d"  id="exampleRadios4" >
  <label class="form-check-label" for="exampleRadios4">
   <?php echo $ans4; ?> </label>
</div>
</button>
</div>
					<div class="mt-2"><input type="submit" id='sub' class='btn btn-primary ' value="Submit"> 
						
					<input type="hidden" name="number" value="<?php echo $qno;?>">					<a href="results.php" class="btn btn-danger">Quit</a></div>
				</form> </div>
</div>
</div>

<?php include "foot.php"; ?>	
<script src="./bootstrap-4.1.3-dist/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="./bootstrap-4.1.3-dist/js/popper.min.js" ></script>
    <script src="./bootstrap-4.1.3-dist/js/bootstrap.min.js" ></script>
</body>
</html>

<?php } 
else {
	header("location: home.php");
}
?>