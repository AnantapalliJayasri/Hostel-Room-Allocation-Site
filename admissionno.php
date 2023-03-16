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
    $q1 = "select * from admissionno where AdNo = '$adno'";
	$result=mysqli_query($conn,$q1);
	$cnt=mysqli_num_rows($result);
    if($cnt == 0){
		$q="insert into admissionno(AdNo) values ('$adno')";
		$result=mysqli_query($conn,$q);
		echo "<h1 align=center>Updated Successfully</h1>";
	
	}	
    else{
        echo "<h1 align=center>Admission Number already exists</h1>";
    }		
}
else{
	echo "<h1 align=center>All fields are required</h1>";
}
?>
