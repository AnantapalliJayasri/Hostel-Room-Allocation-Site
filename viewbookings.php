<?php
session_start();
$servername="localhost";
error_reporting(0);
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password);
mysqli_select_db($conn,"majproj");
$sql="select * from booking";
$result=mysqli_query($conn,$sql) or die("something went wrong".$conn->error);
$num=mysqli_num_rows($result);
if($num > 0){
	$row = mysqli_fetch_array($result);
	echo "<table border=1 align=center>";
	echo "<th>Admission No</th>";
	echo "<th>Name</th>";
	echo "<th>Phone Number</th>";
	echo "<th>Hostel Name</th>";
	echo "<th>Room No</th>";
	echo "<th>Bed No</th>";
	echo "<tr>";
	echo "<td>" .$row["adno"]. "</td>";
	echo "<td>" .$row["name"]. "</td>";
	echo "<td>" .$row["phno"]. "</td>";
	echo "<td>" .$row["hstlname"]. "</td>";
	echo "<td>" .$row["roomno"]. "</td>";
	echo "<td>" .$row["bedno"]. "</td>";
	echo "<tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>" .$row["adno"]. "</td>";
		echo "<td>" .$row["name"]. "</td>";
		echo "<td>" .$row["phno"]. "</td>";
		echo "<td>" .$row["hstlname"]. "</td>";
		echo "<td>" .$row["roomno"]. "</td>";
		echo "<td>" .$row["bedno"]. "</td>";
	    echo "<tr>";
	}
	echo "</table>";
}
?>