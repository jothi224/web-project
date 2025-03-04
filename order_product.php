<?php
session_start();
include './database/db.php';
include './PHPmailer/Mail.php';
include './navbar_user.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color:rgb(247, 207, 207);
            font-family: serif;
        }

     /* nav bar */
        a:hover {
            text-decoration: none;
        }

        a {
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

        #product {
            margin-right: 0px;
            border-radius: 10px;
        }

        .item {
            padding: 0px;
            border: 1px solid none;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        #order {
            margin-left: 130px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .wish-item {
            padding-top: 50px;
        }

        .upimg {
            width: 300px;
            height: 250px;
        }

        #para {
            margin-left: 250px;
            margin-top: -200px;
            font-size: x-large;
            text-align: center;
        }

        #para1 {
            margin-left: 250px;
            font-size: x-large;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: black;
            font-size: larger;
        }

        /* Footer */
        #contact {
            padding: 30px;
            background-color: rgb(250, 209, 250);
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 100px;
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
    </style>
</head>

<body>
    <h1 style="margin-top:100px">Your Order's</h1>
<div id="order">
        <?php
        if (!isset($_SESSION['user_id'])) {
            echo "<script>
            alert('You must be logged in to Order.');
                 window.location.href='login.php';
            </script>";
        }
        $user = $_SESSION['user_id'];
        $qes =  "SELECT orders.payment_method, products.product_image, products.product_name, products.product_price
                    FROM orders
                    JOIN products ON orders.product_id = products.id
                    WHERE orders.user_id = '$user'";
        $qus = $cnnt->query($qes);
        foreach ($qus as $data) {
            echo "<div class='wish-item'>";
            echo "<img class='upimg' src='./uploads/cakes/" . htmlspecialchars($data['product_image']) . "'>";
            echo "<p id='para'>" . htmlspecialchars($data['product_name']) . "</p>";
            echo "<p id='para1'>$" . htmlspecialchars($data['product_price']) . "</p>";

            echo "<p id='para1'>" . $data['payment_method'];

            echo "</div>";
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