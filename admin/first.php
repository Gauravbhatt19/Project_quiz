 <?php
session_start();
include "../connection.php";
$nm="PASS";
$ps='Admin@221344';
$ps=password_hash($ps,PASSWORD_DEFAULT);
$qry="INSERT INTO user_control (name,val_u) VALUES ('$nm','$ps')";
$result= mysqli_query($conn,$qry) or die(mysqli_error($conn));
echo $result;
?>