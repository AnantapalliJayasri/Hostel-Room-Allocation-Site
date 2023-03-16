<?php
$servername="localhost";
error_reporting(0);
$conn =mysqli_connect('localhost','root','');
if(!$conn){
	die("Connection Failed : ". $conn->connect_error);
} 
mysqli_select_db($conn,"majproj");
$adno = $_POST['adno'];
$hstlname = $_POST['hstlname'];
$roomno = $_POST['rno'];
$bedno = $_POST['bedno'];
if(!empty($hstlname) && !empty($roomno) && !empty($bedno)){
	$q1 = "update $hstlname set $bedno = 'yes' where Roomno = $roomno";
	$result=mysqli_query($conn,$q1);
	$q2 = "delete from booking where adno = '$adno'";
	$result1=mysqli_query($conn,$q2);
	echo "<h1 align=center>Updated Successfully</h1>";
}
else{
	echo "<h1 align=center>All fields are required</h1>";
}
?>
