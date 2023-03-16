<?php
session_start();
$servername="localhost";
error_reporting(0);
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password);
mysqli_select_db($conn,"majproj");
$adno = $_POST['adNo'];
if(!empty($adno)){
	  $emailquery1="select * from register where AdNo='$adno'";
	  $result1=mysqli_query($conn,$emailquery1);
      $count1=mysqli_num_rows($result1);	
	  if($count1 == 1){
		 $q2 = "delete from booking where adno = '$adno'";
		$result1=mysqli_query($conn,$q2);
		$q1 = "delete from register where AdNo = '$adno'";
		$result=mysqli_query($conn,$q1);
		
		echo "<h1 align=center>Successfully Removed</h1>";
	  }
	  else{
		 echo "<h1 align=center>Account Doesn't exist</h1>";
	  }
}
else{
	echo "<h1 align=center>All fields are required</h1>";
}
?>

