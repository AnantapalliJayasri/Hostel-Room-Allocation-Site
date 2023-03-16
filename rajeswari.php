<?php
session_start();
$servername="localhost";
error_reporting(0);
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password);
mysqli_select_db($conn,"majproj");
$roomno = $_POST['rno'];
if(!empty($roomno) && (($roomno >= 101 && $roomno <= 110) || ($roomno >= 201 && $roomno <= 210) || ($roomno >= 301 && $roomno <= 310))){
	$sql="select * from rajeswari where Roomno = '$roomno'";
	$result=mysqli_query($conn,$sql) or die("something went wrong".$conn->error);
	$num=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	echo "<h3 align=center>RoomNo:" .$row["Roomno"]. "</h3>";

    if($row["FirstBed"] == 'yes'){
		echo "<h4 align=center>FirstBed - Available</h4>";
	}
	if($row["MiddleBed"] == 'yes'){
		echo "<h4 align=center>MiddleBed- Available</h4>";
	}
	if($row["LastBed"] == 'yes'){
		echo "<h4 align=center>LastBed - Available</h4>";
	}
	if($row["FirstBed"] == 'no' && $row["MiddleBed"] == 'no' && $row["LastBed"] == 'no'){
		echo "<h2>No Beds available</h3>";
	}
	
}
else if(!empty($roomno) && !(($roomno >= 101 && $roomno <= 110) || ($roomno >= 201 && $roomno <= 210) || ($roomno >= 301 && $roomno <= 310))){
	echo "<h2 align=center>Enter a valid roomno</h2>";
}
else{
	echo "<h2 align=center>All the fields are required</h2>";
	
}



?>