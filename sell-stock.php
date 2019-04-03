<!DOCTYPE html>
<html>
<head>
	<title>Sell Stock</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="box">
	<h1> Sell Stock </h1>
	<form action="add-to-cart.php" method="POST">
		<div class="inputbox">
                 <input type="text" name="medicinename" required>
                 <label>MedicineName</label>
        </div>
     	<div class="inputbox">
        	<input type="text" name="quantity" required>
        	<label>Quantity</label>
    	</div>
    	<div class="inputbox">
        	<input type="text" name="price" required>
        	<label>ModifiedPrice</label>
    	</div>
    	<div class="inputbox">
        	<input type="date" name="expiry" required>
        	<label>Expiry Date</label>
    	</div>
		<input type="Submit" name="add-cart-btn" value="Add to Cart">
		<br>
	</form>
	<br>
	<form action="display-cart.php">
		<input type="submit" name="display-btn" value="Display Cart">
	</form>
</div>
</body>
</html>

<?php 
	if(!isset($_GET['modified'])){
        exit();
    }
    else{
        $cartcheck = $_GET['modified'];
        if($cartcheck == "false"){
            echo '<script>';
            	echo 'alert("Invalid Entry into Cart")';
            echo '</script>';
            exit();
        }
    }
 ?>