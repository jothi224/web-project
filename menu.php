<?php
include './database/db.php';
include 'navbar_user.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
      font-family:serif;
    }
    a {
      text-decoration: none;
    }

    /* nav bar */
    a:hover {
      text-decoration: none;
    }

    nav {
      display: flex;
      z-index: 1;
      width: 100%;
      height: 75px;
      align-items: center;
      border-width: 2px;
      border-style: solid;
      border-left-color: transparent;
      border-top-color: transparent;
      border-bottom-color: brown;
      display: flex;
      position: fixed;
      justify-content: space-between;
      left: 0px;
      top: 0px;
      background-color: whitesmoke;
      box-shadow: 0 2px 5px 0 rgba(209, 255, 215, 0.16), 0 2px 10px 0 rgb(0, 0, 0, 0.12);
    }

    #logo {
      border: 2px solid transparent;
      width: 255px;
      height: 70px;
      border-right-color: brown;
    }

    #user {
      text-align: center;
      font-size: 28px;
      position: relative;
      position: fixed;
      /* margin-top: 10px;
    margin-left: 1050px; */

    }

    .navs {
      padding-top: 70px;
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      text-align: center;
      width: 850px;
    }

    .navs a {
      color: brown;
      letter-spacing: 2px;
    }

    .dropbtn {
      /* padding: 10px; */
      font-size: 18px;
      letter-spacing: 2px;
      /* width: 200px; */
      /* height: 50px; */
      /* margin-top: -40px; */
      cursor: pointer;
      background-color: transparent;
      border: none;
      color: brown;
      /* word-spacing: 10px; */
    }

    .dropdown {
      /* position: relative; */
      display: inline-block;
      /* width: 200px; */
      /* margin-left: 1100px; */
      /* margin-top: 45px; */
      z-index: 1;
      /* position: fixed; */
    }

    .dropdown-content {
      display: none;
      margin-top: 30px;
      margin-left: -40px;
      position: absolute;
      border: 2px solid gold;
      background-color: white;
      box-shadow: 2px 3px 0px;
      min-width: 200px;
      box-shadow: 0px 8px 16px 0px rgba(75, 73, 73, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      font-size: large;
    }

    .dropdown-content a:hover {
      background-color: rgb(238, 209, 171);
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    #cat {
      cursor: pointer;
    }


    /* Button inside dropdown */
    .dropbtns {
      /* padding: 10px; */
      font-size: 16px;
      letter-spacing: 2px;
      /* width: 200px; */
      /* height: 50px; */
      cursor: pointer;
      background-color: transparent;
      border: none;
      /* word-spacing: 10px; */
      color: brown;
      /* width: 50px; */
    }

    /* Dropdown container */
    .dropdowns {
      position: relative;
      display: inline-block;
      width: 200px;
      /* margin-left: 1050px; */
      /* margin-top: -5px; */
      z-index: 1;
      /* width: 50px; */
    }

    /* Dropdown content (hidden by default) */
    .dropdown-contents {
      display: none;
      margin-top: 30px;
      border: 2px solid gold;
      position: absolute;
      background-color: white;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      min-width: 200px;
      z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-contents a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      font-size: large;
      transition: background-color 0.3s ease, color 0.3s ease;
      /* Smooth hover effect */
    }

    /* Hover effect for links */
    .dropdown-contents a:hover {
      background-color: rgb(243, 214, 176);
    }

    /* Show dropdown on hover */
    .dropdowns:hover .dropdown-contents {
      display: block;
    }

    /* Contact link styling */
    .contact-link {
      color: brown;
      right: 20px;
      top: 20px;
      font-size: large;
    }

    /* footer */
    #contact {
      padding: 30px;
      background-color: rgb(250, 209, 250);
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .con {
      font-size: larger;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      text-align: center;
      color: darkred;
      letter-spacing: 2px;
      line-height: 30px;
    }

    #low {
      font-size: x-large;
      color: darkred;
      height: 250px;
      /* width: 200px; */
      text-align: center;
      letter-spacing: 1.5px;
      line-height: 30px;
    }

    #low a {
      color: rgb(110, 4, 4);
    }

    #image {
      height: 300px;
    }

    /* this page css */
    .item {
      text-align: center;
      justify-items: center;
      padding: 0px;
      border: 1px solid none;
      border-radius: 5px;
    }

    .upimg {
      width: 250px;
      height: 200px;
      margin: 20px;
    }

    .upimg:hover {
      height: 250px;
      width: 280px;
    }

    .one {
      padding-top: 30px;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 15px;
    }

    #para {
      text-align: center;
      font-size: 24px;
      height: 30px;
      font-family: 'Times New Roman', Times, serif;
      color: brown;
    }

    .pros {
      font-size: xx-large;
      text-align: center;
      margin-top: 30px;
      color: maroon;
      height: 5px;
    }
  </style>
</head>

<body>
  <br><br><br>
  <p class="pros">Our Products</p>
  <div class="one">
    <?php

    // Brownies
    $front = "select * from front_images where id='1'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/brownies.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }
    //  Pastries
    $front = "select * from front_images where id='2'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/pastries.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }
    // Combo
    $front = "select * from front_images where id='3'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/combo.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }
    // Cookies
    $front = "select * from front_images where id='4'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/cookies.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }
    // Puff
    $front = "select * from front_images where id='5'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/puff.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }

    // Sandwich
    $front = "select * from front_images where id='6'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/sandwich.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }

    // eggless_cakes
    $front = "select * from front_images where id='7'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/eggless.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }
    // Cakes
    $front = "select * from front_images where id='8'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/cake.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }

    // Breads
    $front = "select * from front_images where id='9'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/bread.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }

    // Fresh_Juice
    $front = "select * from front_images where id='10'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/fresh_juice.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }

    // Mousse
    $front = "select * from front_images where id='11'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/mousse.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }

    // Milkshake
    $front = "select * from front_images where id='12'";
    $fronts = $cnnt->query($front);
    foreach ($fronts as $frt) {
      echo "<a href='./menu_items/milkshake.php'>";
      echo "<div id='wish'>";
      echo "<img class='upimg' src='./uploads/cakes/" . $frt['image'] . "'>";
      echo "<p id='para'>" . $frt['name'] . "</p>";
      // echo "<p>".$frt['product_price']."</p>";
      echo "</div>";
      echo "</a>";
    }
    ?>
  </div>
  <!-- Contact -->
  <div id="contact">
    <div class="con">
      <?php
      $q = "select * from updates order by id desc limit 1";
      $qus = $cnnt->query($q);
      foreach ($qus as $qes) { ?>
        <?php echo "<p class='cons'>" . $qes['brand'] . "</p>"; ?>
        <?php echo "<p class='cons'>" . $qes['door']; ?>
        <?php echo $qes['street'] . "</p>"; ?>
        <?php echo "<p class='cons'>" . $qes['Town'] . "-" . $qes['pincode'] . "</p>"; ?>
        <?php echo "<p class='cons'>" . $qes['district'] . "</p>"; ?>
        <?php echo "<p class='cons'>" . $qes['states'] . "</p>"; ?>
        <!-- <?php echo "<p class='cons'>" . $qes['pincode'] . "</p>"; ?> -->
        <?php echo "<p class='cons'>" . $qes['mobile'] . "</p>"; ?>
        <?php echo "<p class='cons'>" . $qes['email'] . "</p>"; ?>
      <?php }
      ?>
    </div>
    <div id="low">
      <a href="#">About</a><br><br>
      <a href="#">Product</a><br><br>
      <a href="cart.php">Cart</a><br><br>
      <a href="./uploads/">Gallery</a><br><br>
      <a href="setting_login.php">Setting</a>
    </div>
    <div>
      <img src="./images/entrance.jpg" alt="Entrance Look" id="image">
    </div>
  </div>
</body>
</html>