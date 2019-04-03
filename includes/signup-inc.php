<?php
	session_start();
	include 'dbh-inc.php';
	$phn_num = mysqli_real_escape_string($conn, $_POST['phn_num']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$cname = mysqli_real_escape_string($conn, $_POST['cname']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);

	if($password == $cpassword){
		$sql_q = "SELECT * FROM customer WHERE PhoneNumber = '$phn_num' OR Password = '$password'";
		$result = mysqli_query($conn, $sql_q);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck == 0)
		{
			$sql = "INSERT INTO customer VALUES ('$cname', '$age', '$phn_num', '$address', '$password');";
			$result = mysqli_query($conn, $sql);
			$_SESSION['phn_num']=$phn_num;
			header("Location: /medisupply/mainpage.php?signup=succs");
		}
		else{
			header("Location: /medisupply/register.php?signup=fieldexists");
		}
	}
	else{
		/*echo '<script language="javascript">';
		echo 'alert("Password fields does not match")';
		echo '</script>';*/
		header("Location: /medisupply/register.php?signup=pwds&phn_num=$phn_num&age=$age&address=$address&cname=$cname");
	}

?> 