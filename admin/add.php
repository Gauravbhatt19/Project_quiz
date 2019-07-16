<?php session_start(); ?>
<?php include "../connection.php";
if (isset($_SESSION['admin'])) {

if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);


    $checkqsn = "SELECT * FROM questions";
	$runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
	$qno = mysqli_num_rows($runcheck) + 1;

	$query = "INSERT INTO questions(qno, question , ans1, ans2, ans3, ans4, correct_answer) VALUES ('$qno' , '$question' , '$choice1' , '$choice2' , '$choice3' , '$choice4' , '$correct_answer') " ;
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully added'); </script> " ;
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
<div class='container-fluid text-center bg-secondary text-white p-2'>Edit a question</div>
  <div class='form-row m-1'>
    <div class='col-lg-12 mb-3'>
      <label for='validationDefault01'>Question</label>
      <input type='text' class='form-control' id='validationDefault01' name="question" required >
   </div>
   <div class='col-lg-12 mb-3'>
      <label for='validationDefault02'>Choice #1</label>
      <input type='text' class='form-control' id='validationDefault02' name="choice1" required>
    </div>
       <div class='col-lg-12 mb-3'>
      <label for='validationDefault02a'>Choice #2</label>
      <input type='text' class='form-control' id='validationDefault02' name="choice2" required>
    </div>
       <div class='col-lg-12 mb-3'>
      <label for='validationDefault02b'>Choice #3</label>
      <input type='text' class='form-control' id='validationDefault02b' name="choice3" required>
    </div>
       <div class='col-lg-12 mb-3'>
      <label for='validationDefault02c'>Choice #4</label>
      <input type='text' class='form-control' id='validationDefault02' name="choice4" required>
    </div>
    <div class='col-lg-12 mb-3'>
      <label for='validationDefaultUsername'>Correct answer</label>
    					<select name="answer" id='validationDefaultUsername' class="custom-select">
                        <option value="a">Choice #1 </option>
                        <option value="b">Choice #2</option>
                        <option value="c">Choice #3</option>
                        <option value="d">Choice #4</option>
                    </select>
                   </div> 
  <button class='btn btn-dark ml-5 m-2' type='submit' name="submit">Add</button> 
  <a class='btn btn-light ml-5 m-2' href='./allquestions.php'>Back</a> 
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