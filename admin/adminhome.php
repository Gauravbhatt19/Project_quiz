<?php 
session_start();
include "../connection.php";
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

<div class="container-fluid">
<?php 
 $qry="SELECT * FROM user_control WHERE name <> 'PASS' "; 
 $result=mysqli_query($conn,$qry);
?>
<div class="card" style="margin:10px;">
 <div class="card-body"  style="margin-bottom:-30px;">
    <h5 class="card-title text-center">Portal Dashboard</h5>
   <table class="table table-hover">
  <tbody>
  	<?php
  	while(  $result_set=mysqli_fetch_assoc($result)){ 
  $name=$result_set['name'];
  $status=$result_set['val_u'];
  if ($name=='TIME'){
 echo " <tr><th>". $name." to start Quiz</th><th>";
   	echo "<input type='text' value='".$status."' id='tm' onblur='timechnge()'>";
   	 echo "</th></tr>";
  }
  else{
  echo " <tr><th>". $name."</th><th>";
   if($status=='TRUE') 
   	echo "<a style='color:green;' href='javascript:void(0)' onclick='status_chnge(1,\"".$name."\")'>Active</a>";
   	 else echo "<a style='color:red;' href='javascript:void(0)' onclick='status_chnge(0,\"".$name."\")'>Down</a>";
   	 echo "</th></tr>";}
   	}
    ?>
  </tbody>
</table>   
</div>
</div>
</div>
    <script>
    	function timechnge(){
    		var vl= document.getElementById('tm').value;
    		 var st="timechange.php?val="+vl;
    			window.location.href = st;
    	}
    	function status_chnge(x,id){
  if(x==1){  
  	var st= "statuschange.php?val=FALSE&id="+id;
  	window.location= st;
  }
  else
  { var st= "./statuschange.php?val=TRUE&id="+id;
     window.location= st;
  }
}
</script>

  <?php include "../foot.php"; ?>  
<script src="../bootstrap-4.1.3-dist/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../bootstrap-4.1.3-dist/js/popper.min.js" ></script>
    <script src="../bootstrap-4.1.3-dist/js/bootstrap.min.js" ></script>
				</body>
				</html>

				<?php } 
				else {
					$_SESSION['err']="Please Login First...!";
				header("location: ./index.php");
				}
				?>