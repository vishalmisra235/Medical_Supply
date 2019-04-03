
<head>
	<title>Show Cart</title>
	<link rel="stylesheet" href="css/stockdisplay.css">
</head>
<?php 
	include_once 'includes/dbh-inc.php';
	session_start();
	$shopid = $_SESSION['shopid'];
	$sql = "SELECT * FROM cart WHERE ShopID = '$shopid';";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0){
		echo '<form action="send-notifications.php" method="POST">';
		echo '<h1><center><br> Your Cart</center></h1>';
        echo '<table id="stock">';
        	echo '<tr>';
              echo '<th>MedicineName</th>';
              echo '<th>Quantity</th>';
              echo '<th>Price</th>';
              echo '<th>Expiry(DD-MM-YYYY)</th>';
            echo '</tr>';
		while($row = mysqli_fetch_assoc($result)){
			echo '<tr>';
				echo '<td>' . $row['MedicineName'] . '</td>';
				echo '<td>' . $row['Quantity'] . '</td>';
				echo '<td>' . $row['Price'] . '</td>';
				echo '<td>' . $row['Expiry'] . '</td>';
			echo '</tr>';
		}
		echo '</table>';
		echo '<br>';
		echo '<center><input type="submit" id ="sendnot-btn" class="button1" value="Send Notifications"></center>';
		echo '</form>';
	}
 ?>