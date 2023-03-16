<?php
$servername="localhost";
error_reporting(0);
$adno1 = $_POST['adNo'];
$username=$_POST['user'];
$password= $_POST['psw'];
$cpassword = $_POST['repsw'];
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);
if(!empty($adno1) && !empty($username) && !empty($password) && !empty($cpassword)){
		$conn =mysqli_connect('localhost','root','');
		if(!$conn){
			die("Connection Failed : ". $conn->connect_error);
		} 
			mysqli_select_db($conn,"majproj");
			$emailquery="select * from admissionno where AdNo='$adno1'";
	        $result=mysqli_query($conn,$emailquery);
            $emailcount=mysqli_num_rows($result);	
            $emailquery1="select * from register where AdNo='$adno1'";
	        $result1=mysqli_query($conn,$emailquery1);
            $emailcount1=mysqli_num_rows($result1);	

			if($emailcount != 1){
				echo("<script LANGUAGE='JavaScript'>
				      window.alert('Invalid user');
					  window.location.href='register.html';
					  </script>");
			}
			else if($emailcount1 != 0){
				echo("<script LANGUAGE='JavaScript'>
				      window.alert('Already registered user');
					  window.location.href='Login.html';
					  </script>");
			}
			else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
				echo("<script LANGUAGE='JavaScript'>
				      window.alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character');
					  window.location.href='register.html';
					  </script>");
			}
			else{
				if($password==$cpassword){
			    $q="insert into register(AdNo,username,password,confirmpassword) values ('$adno1','$username', '$password', '$cpassword')";
		        $iquery=mysqli_query($conn,$q);
				if($iquery){
					echo("<script LANGUAGE='JavaScript'>
				      window.alert('sucessfully registered');
					  window.location.href='Login.html';
					  </script>");
				}
				else{
					echo("<script LANGUAGE='JavaScript'>
				      window.alert('Registration not successful');
					  window.location.href='register.html';
					  </script>");
			    }
			}
			else{
				echo("<script LANGUAGE='JavaScript'>
				      window.alert('Passwords not matching');
					  window.location.href='register.html';
					  </script>");
				}
			}
		}
else{
	echo("<script LANGUAGE='JavaScript'>
		window.alert('All fields are required');
		window.location.href='register.html';
		</script>");
}
?>
