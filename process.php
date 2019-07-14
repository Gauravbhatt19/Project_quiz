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
    $qry1="SELECT val_u FROM user_control WHERE name='TEST'";
    $result1= mysqli_query($conn,$qry1) or die(mysqli_error($conn));
    $resultset1=mysqli_fetch_assoc($result1);
    $check1=$resultset1['val_u']; 
    if($check1!='TRUE'){
        $_SESSION['success']='Quiz is not started yet..!';
      header("location: ./home.php");
    }
	if(!isset($_SESSION['tattmpt'])) {
        $_SESSION['tattmpt'] = 0;
        $_SESSION['tcorrect'] = 0;
        $_SESSION['tleft'] = 0;
	}
	if ($_POST) {
        $newtime = time();
    if ( $newtime >= $_SESSION['time_up']) {
         $_SESSION['tattmpt'] += 1;
        $_SESSION['start_time'] = $newtime;
        $qno = $_POST['number'];
        $_SESSION['quiz'] = $_SESSION['quiz'] + 1;
        $selected_choice = $_POST['choice'];
        $nextqno = $qno+1;
        $query1 = "SELECT * FROM questions ";
        $run = mysqli_query($conn , $query1) or die(mysqli_error($conn));
        $totalqn = mysqli_num_rows($run);
        if ($qno == $totalqn) {
            echo "<script>alert('Time up, For this Question');
    window.location.href='results.php';</script>";
        }
        else {
            echo "<script>alert('Time up, For this Question');
     window.location.href='question.php?n=".$nextqno."';</script>";
        }
   
}
else {
                if($_POST['choice']=="a" or $_POST['choice']=="b" or $_POST['choice']=="c" or $_POST['choice']=="d"){
       $_SESSION['tattmpt'] += 1; }
        else{  $_SESSION['tleft']+=1;
        }
        $_SESSION['start_time'] = $newtime;
		$qno = $_POST['number'];
        $_SESSION['quiz'] = $_SESSION['quiz'] + 1;
		$selected_choice = $_POST['choice'];
		$nextqno = $qno+1;
		$query = "SELECT correct_answer FROM questions WHERE qno= '$qno' ";
        $run = mysqli_query($conn , $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($run) > 0 ) {
        	$row = mysqli_fetch_array($run);
        	$correct_answer = $row['correct_answer'];
        }
        if ($correct_answer == $selected_choice) {
        $_SESSION['tcorrect'] += 1;
        }

        $query1 = "SELECT * FROM questions ";
        $run = mysqli_query($conn , $query1) or die(mysqli_error($conn));
        $totalqn = mysqli_num_rows($run);

        if ($qno == $totalqn) {
        	header("location: results.php");
        }
        else {
        	header("location: question.php?n=".$nextqno);
        }

    
}
}
else {
    header("location: home.php");
}
}
else {
	header("location: home.php");
}
?>