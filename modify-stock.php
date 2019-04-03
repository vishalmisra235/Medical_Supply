<?php 
	include_once 'includes/dbh-inc.php';
	session_start();
	$i = 0;
	$shopid = $_SESSION['shopid'];
	while(isset($_POST['MedicineName'][$i])){
		$MedicineName = $_POST['MedicineName'][$i];
		$Quantity = $_POST['Quantity'][$i];
		$Price = $_POST['Price'][$i];
		$Expiry = $_POST['Expiry'][$i];
		$sql = "SELECT * FROM medicinestock WHERE ShopID = '$shopid' AND MedicineName = '$MedicineName' AND Quantity = '$Quantity' AND Price = '$Price' AND Expiry = '$Expiry';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck == 0){
			$sql2 = "INSERT INTO medicinestock VALUES ('$shopid', '$MedicineName', '$Quantity', '$Price', '$Expiry');";
			mysqli_query($conn, $sql2);
		}
		$i = $i + 1;
	}
	header("Location: display-stock.php?modified=true");
 ?>