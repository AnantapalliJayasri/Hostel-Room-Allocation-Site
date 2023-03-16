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
$sql="select 'username','password' from register where username='$username' AND password='$password'";
$result=mysqli_query($conn,$sql) or die("something went wrong".$conn->error);
$num=mysqli_num_rows($result);
$sql1="select 'username','password' from register where username='$username' or password='$password'";
$result1=mysqli_query($conn,$sql1) or die("something went wrong".$conn->error);
$num1=mysqli_num_rows($result1);

if($num>0){
	echo "login successful";
	header("location:mainframe.html");
}
else if($num1 == 1){
	echo("<script LANGUAGE='JavaScript'>
		 window.alert('you have entered incorrect credentials');
		window.location.href='login.html';
		</script>");
}
else if($num == 0){
	echo("<script LANGUAGE='JavaScript'>
		 window.alert('You have not registered yet!');
		window.location.href='register.html';
		</script>");

}
else{
	echo("<script LANGUAGE='JavaScript'>
		 window.alert('you have entered incorrect credentials');
		window.location.href='login.html';
		</script>");
}
?>