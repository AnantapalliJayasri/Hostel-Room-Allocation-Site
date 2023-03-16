<?php
session_start();
$servername="localhost";
error_reporting(0);
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password);
mysqli_select_db($conn,"majproj");
$username = $_POST['username'];
$password = $_POST['password'];
if($username == "admin" && $password=="svecw"){
	echo "login successful";
	header("location:adminnext.html");
}
else{
	echo("<script LANGUAGE='JavaScript'>
		 window.alert('you have entered incorrect credentials');
		window.location.href='adminlogin.html';
		</script>");
}
?>