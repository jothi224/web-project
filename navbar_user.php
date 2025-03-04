<?php
// include './database/db.php';
$cnnt=mysqli_connect('localhost','root','','shop');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="./css/first.css"> -->
     <style>
        body{
      font-family:serif;
    }
     </style>
</head>
<body>
    
    <!-- Nav bar -->
    <nav style="position: fixed;">
        <?php
        $q = "select * from updates order by id desc limit 1";
        $qus = $cnnt->query($q);
        foreach ($qus as $qes) {
            echo "<img src='./uploads/" . htmlspecialchars($qes['logo']) . "' id='logo'>";
        } ?>
        <div class="navs">
        <a href="first.php#about" class="us">ABOUT AS</a>
        <a href="first.php#product" class="pro">PRODUCTS</a>
        <!-- profile-->
        <div class="dropdowns">
            <button class="dropbtns">
            PROFILE
        </button>
            <div class="dropdown-contents">
                <a href="login.php">Login <i class="fa-solid fa-right-to-bracket"></i></a>
                <a href="user_address.php">Profile</a>
                <a href="logout.php" style="display: block;">Logout <i class="fa-solid fa-left-to-bracket"></i></a>
            </div>
        </div>
        <!-- Contact -->
        <a href="first.php#contact">
            CONTACT US
        </a>
        <!-- Menu -->
        <div class="dropdown">
            <button class="dropbtn">
                <i class="fa-solid fa-bars">

                </i> Menu</button>
            <div class="dropdown-content">
                <div id="item">
                    <a href="cart.php">Cart items</a>
                    <a href="wishlist.php">wishlist</a>
                    <a href="order_product.php">Order products</a>
                    <a href="setting_login.php">Setting</a>
                    <!-- <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> -->
                </div>
            </div><br><br><br><br>
        </div></div>
    </nav>
</body>
</html>