<?php 
	include_once 'includes/dbh-inc.php';
	session_start();
	$shopid = $_SESSION['shopid'];
	$medicinename = $_POST['medicinename'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$expiry = $_POST['expiry'];
	$sql2 = "SELECT * FROM medicinestock WHERE ShopID = '$shopid' AND MedicineName = '$medicinename' AND Quantity >= '$quantity' AND Expiry = '$expiry';";
	$result = mysqli_query($conn, $sql2);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0){
		$sql = "INSERT INTO cart VALUES('$shopid','$medicinename','$quantity','$price','$expiry', 'false');";
		mysqli_query($conn, $sql);
		header("Location: sell-stock.php?modified=true");
	}
	else{
		header("Location: sell-stock.php?modified=false");
	}
 ?>