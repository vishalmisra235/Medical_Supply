
<?php
session_start();
?>
<head>

<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="box">
         <h1>Shop Owner Login</h1>
         <form action="includes/shopowner-login-inc.php" method="POST">
             <div class="inputbox">
                 <input type="text" name="shopid" required>
                 <label>ShopID</label>
             </div>
             <div class="inputbox">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <input type="Submit" name="admin-login-btn" value="Submit">
         </form>
         <?php 
            if(!isset($_GET['shopownerlogin'])){
                exit();
            }
            else {
                $loginCheck = $_GET['shopownerlogin'];
                if($loginCheck == "Invalid"){
                    echo '<p style="color:#fff;" class="error">Invalid ShopID or Password!! Try again</p>';
                    exit();
                }
            }
            if(!isset($_GET['action']))
            {
                exit();
            }
            else{
                $x=$_GET['action'];
                if($x=='logout'){
                    session_unset();
                }
            }
         ?>
    </div>
</body>
