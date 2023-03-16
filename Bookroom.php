<?php
session_start();
$servername="localhost";
error_reporting(0);
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password);
mysqli_select_db($conn,"majproj");
$adno = $_POST['adno'];
$name = $_POST['name'];
$phoneno = $_POST['phno'];
$hstlname = $_POST['hstlname'];
$roomno = $_POST['rno'];
$bedno = $_POST['bedno'];
if(!empty($adno) && !empty($name) && !empty($phoneno) && !empty($hstlname) && !empty($roomno) && !empty($bedno) && (($roomno >= 101 && $roomno <= 110) || ($roomno >= 201 && $roomno <= 210) || ($roomno >= 301 && $roomno <= 310))){
		 $q1 ="select * from register where AdNo='$adno'";
	     $result1=mysqli_query($conn,$q1);
         $count1=mysqli_num_rows($result1);	
		 $q2 = "select * from booking where adno='$adno'";
		 $result2=mysqli_query($conn,$q2);
         $count2=mysqli_num_rows($result2);	
		 if($count1 == 1 && $count2 == 0){
			 $q3 = "select $bedno from $hstlname where Roomno=$roomno";
			 $result3=mysqli_query($conn,$q3);
			 $row = mysqli_fetch_array($result3);
			if(strlen($phoneno) != 10){
			 echo("<script LANGUAGE='JavaScript'>
				      window.alert('Length of phone number should be 10 digits');
					  window.location.href='Bookroom.html';
					  </script>");
			}
			 else if($row[0] == 'yes'){
				 $q="insert into booking(adno,name,phno,hstlname,roomno,bedno) values ('$adno','$name', '$phoneno', '$hstlname','$roomno','$bedno')";
			     $iquery=mysqli_query($conn,$q);
				 if($iquery){
					 echo "<h1>A room is Successfully Booked on your admission number</h1>";
				 }
				 $qu1 = "update $hstlname set $bedno = 'no' where Roomno = $roomno";
				 $result=mysqli_query($conn,$qu1);
			 }
			 else{
				 echo("<script LANGUAGE='JavaScript'>
				      window.alert('This room is already booked');
					  window.location.href='Bookroom.html';
					  </script>");
			 }
			 
		 }
		 else if($count1 != 1){
			 echo("<script LANGUAGE='JavaScript'>
				    window.alert('Check your AdmissionNumber');
					window.location.href='Bookroom.html';
					 </script>");
		 }
		 else{
			 echo("<script LANGUAGE='JavaScript'>
				      window.alert('A room is already booked with this adno');
					  window.location.href='Bookroom.html';
					  </script>");
		 }
          
		 
}
else if(!empty($adno) && !empty($name) && !empty($phoneno) && !empty($hstlname) && !empty($roomno) && !empty($bedno) && !(($roomno >= 101 && $roomno <= 110) || ($roomno >= 201 && $roomno <= 210) || ($roomno >= 301 && $roomno <= 310))){
	echo "<h2 align=center>Enter a valid roomno</h2>";
}
else{
	echo "All fields are required";
}
?>