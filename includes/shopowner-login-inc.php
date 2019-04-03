<?php
    session_start();
	include_once 'dbh-inc.php';
	$shopid = mysqli_real_escape_string($conn, $_POST['shopid']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
   

	$sql = "SELECT * FROM shopowner WHERE shopid = '$shopid' AND password = '$password';";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0){
        $_SESSION['shopid']=$shopid;
		header("Location: ../display-stock.php?shopownerlogin=succcs");
	}
	else{
		header("Location: ../shopownerlogin.php?shopownerlogin=Invalid");
	}

?> 