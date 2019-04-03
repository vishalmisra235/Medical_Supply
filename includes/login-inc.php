<?php
	session_start();
	include_once 'dbh-inc.php';
	$phn_num = mysqli_real_escape_string($conn, $_POST['phn_num']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


	$sql = "SELECT * FROM customer WHERE PhoneNumber = '$phn_num' AND Password = '$password';";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0){
		$_SESSION["phn_num"]= $phn_num;
		header("Location: /medisupply/mainpage.php?login=succcs");
	}
	else{
		header("Location: /medisupply/index.php?login=Invalid");
	}

?> 