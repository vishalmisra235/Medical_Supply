<?php 
    include_once 'includes/dbh-inc.php';
	session_start();

	$dest_shop = $_SESSION['shopid'];
	echo $dest_shop;
	$row_num = $_GET['rowid'];
	echo $row_num;
	$sql = "SELECT * FROM cart WHERE ShopID != '$dest_shop' AND notifications='true';";
    $result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	$i = 1;
	if($resultCheck > 0){
		while($row = mysqli_fetch_assoc($result)){
			if($i == $row_num){
				$src_shop = $row['ShopID'];
				echo $src_shop;
				echo $i;
				$medi = $row['MedicineName'];
				echo $medi;
				$qua = $row['Quantity'];
				$pr = $row['Price'];
				$exp = $row['Expiry'];
			}
			$i = $i + 1;
		}

		$sql_del = "DELETE FROM cart WHERE ShopID = '$src_shop' AND MedicineName = '$medi' AND Quantity = '$qua' AND Price = '$pr' AND Expiry = '$exp';";
		mysqli_query($conn, $sql_del);

		$sql_ins = "INSERT INTO medicinestock VALUES ('$dest_shop', '$medi', '$qua', '$pr', '$exp');";
		mysqli_query($conn, $sql_ins);


		$sql_q = "SELECT Quantity FROM medicinestock WHERE ShopID = '$src_shop' AND MedicineName = '$medi' AND Expiry = '$exp';";
		$result1 = mysqli_query($conn, $sql_q);
		$resultCheck1 = mysqli_num_rows($result1);
		if($resultCheck1 > 0){
			$row1 = mysqli_fetch_assoc($result1);
			$org_q = $row1['Quantity'];
			if ($org_q > $qua){
				$new_q = $org_q - $qua;
				$sql_up = "UPDATE medicinestock SET Quantity = '$new_q' WHERE ShopID = '$src_shop' AND MedicineName = '$medi' AND Expiry = '$exp';";
				mysqli_query($conn, $sql_up);
			}
			else{
				$sql_de = "DELETE FROM medicinestock WHERE ShopID = '$src_shop' AND MedicineName = '$medi' AND Expiry = '$exp';";
				mysqli_query($conn, $sql_de);
			}
		}
	}
	header("Location: display-stock.php?accept=true");
 ?>