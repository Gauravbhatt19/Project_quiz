<?php session_start(); ?>
<?php include "../connection.php";
if (isset($_SESSION['admin'])) {
	$qry="SELECT val_u FROM user_control WHERE name='LOGIN'";
    $result= mysqli_query($conn,$qry) or die(mysqli_error($conn));
    $resultset=mysqli_fetch_assoc($result);
    $check=$resultset['val_u']; 
    if($check!='TRUE'){
      header("location: ../waiting.php");
    }
?>
<html>
	<head>
		<title>Spiders | Quiz</title>  
		<link rel="icon" href="../logo_final.jpg" type="image/jpg">
  	<link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css" >
  	 <meta name='viewport' content="width=device-width,initial-scale=0.8" />
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
      <th scope="col">Rank</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Mobile No.</th>
        <th  scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php      
  		$cnt=1;
            $query = "SELECT * FROM users ORDER BY tcorrect DESC";
            $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_players) > 0 ) {
            while ($row = mysqli_fetch_array($select_players)) {
                $mbno = $row['mbno'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $tcorrect = $row['tcorrect'];
                echo "<tr><th scope='row'>".$cnt."</th>";
                echo "<td>$fname</td>";
                echo "<td>$lname</td>";
                echo "<td>$mbno</td>";
                echo "<td> <select onchange='chnge($mbno,this.value)' class='custom-select'><option disabled value='0' selected>Action</option><option value='1'>Edit</option><option value='2'>Delete</option><option value='3'>Reset</option></select></td>";
                echo "</tr>";
                $cnt++;
             }
         }
        ?>
        <script>
  function chnge(qno,tod) {
    if(tod==1){
      var lnk="./editp.php?id="+qno;
      window.location=lnk;
          }
   else if(tod==2){
     var test= window.confirm("Are you sure, You want to delete this player..!");
            if(test == true){
            var lnk="./delp.php?id="+qno;
        window.location=lnk;
          }
        }
        else{
     var test= window.confirm("Are you sure, You want to reset this player\'s detail for Quiz..!");
            if(test == true){
            var lnk="./resetp.php?id="+qno;
        window.location=lnk;
          }
          
        }

   } 
  </script>
   	</tbody>
	</table>
</div>
		<?php include "../foot.php"; ?>
		<script src="../bootstrap-4.1.3-dist/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../bootstrap-4.1.3-dist/js/popper.min.js" ></script>
    <script src="../bootstrap-4.1.3-dist/js/bootstrap.min.js" ></script>
	</body>
</html>
	

<?php } 
else {
	header("location: ./");
}
?>

