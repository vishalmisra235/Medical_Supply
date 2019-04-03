<?php 
	session_start();
	include 'includes/dbh-inc.php';
	$shopid_src = $_SESSION['shopid'];
	$sql = "UPDATE cart SET notifications='true' WHERE ShopID='$shopid_src';";
	mysqli_query($conn, $sql);
	header("Location: display-stock.php?notifications=true&src_shopid=$shopid_src");
 ?>