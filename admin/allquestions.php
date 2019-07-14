<?php session_start(); ?>
<?php include "../connection.php";
if (isset($_SESSION['admin'])) {
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

		
	<div class='container-fluid mt-2 mb-5'>
  	<table class="table table-hover table-dark text-center">
  <thead>
    <tr>
      <th  scope="col">Q.NO</th>
				<th  scope="col">Question</th>
				<th  scope="col">Option1</th>
				<th  scope="col">Option2</th>
				<th  scope="col">Option3</th>
				<th  scope="col">Option4</th>
				<th  scope="col">Correct Answer </th>
				<th  scope="col">Action</th>
			</tr>
  </thead>
		<tbody>
        
        <?php 
            
            $query = "SELECT * FROM questions ORDER BY qno";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
                $qno = $row['qno'];
                $question = $row['question'];
                $option1 = $row['ans1'];
                $option2 = $row['ans2'];
                $option3 = $row['ans3'];
                $option4 = $row['ans4'];
                $Answer = $row['correct_answer'];
                echo "<tr>";
                echo "<th scope='row'>$qno</th>";
                echo "<td>$question</td>";
                echo "<td>$option1</td>";
                echo "<td>$option2</td>";
                echo "<td>$option3</td>";
                echo "<td>$option4</td>";
                echo "<td>$Answer</td>";
                echo "<td> <select onchange='chnge($qno,this.value)' class='custom-select'><option disabled value='0' selected>Action</option><option value='1'>Edit</option><option value='2'>Delete</option></select></td>";
              
                echo "</tr>";
             }

         }
         echo "<tr><th colspan='8'><a href='./add.php' class='btn btn-warning'><b>Add Question</b></a></th></tr>";
        ?>
	<script>
	function chnge(qno,tod) {
	 	if(tod==1){
	 		var lnk="./editquestion.php?qno="+qno;
	 		window.location=lnk;
	 			 	}
	 else{
	 	 var test= window.confirm("Are you sure, You want to delete this question..!");
        		if(test == true){
        		var lnk="./del.php?qno="+qno;
	 			window.location=lnk;
        	}
        }
	 } 
	</script>
		</tbody>
		
	</table>

</div>  <?php include "../foot.php"; ?>  
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


