<?php
include './database/db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/first.css">
    <link rel="stylesheet" href="cart.php">

    <script type="text/javascript"
        src="//code.jquery.com/jquery-1.9.1.js">
    </script>

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
            <a href="#about" class="us">ABOUT AS</a>
            <a href="#product" class="pro">PRODUCTS</a>
            <!-- profile-->
            <div class="dropdowns">
                <button class="dropbtns">
                    PROFILE
                </button>
                <div class="dropdown-contents">
                    <a href="loading.php">Login </a>
                    <a href="user_address.php">Profile</a>
                    <a href="logout.php" style="display: block;">Logout <i class="fa-solid fa-right-to-bracket"></i></a>
                </div>
            </div>
            <!-- Contact -->
            <a href="#contact">
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
                        <a href="order_Product.php">Order products</a>
                        <a href="setting_login.php">Setting</a>
                        <!-- <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> -->
                    </div>/
                </div><br><br><br><br>
            </div>
        </div>
    </nav>
    <!-- Slide image -->
    <div class="slide-container" style="justify-content: center;justify-items:center;margin-top:100px;">
        <div class="fade">
            <img class="myslide" src="./images/slide1.jpg" alt="brownie" style="width:900px;height:550px">
        </div>
        <div class="fade">
            <img class="myslide" src="./images/slide2.jpg" alt="Rose milk" style="width:900px; height:550px;">
        </div>
        <div class="fade">
            <img class="myslide" src="./images/slide3.jpg" alt="cookie brownie" style="width:900px; height:550px">
        </div>
        </div>
         <div style="text-align: center;">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <button class='menu'><a href='menu.php'>Order Now</a></button>

    </div>
    <script>
        let slideindex = 0;
        showslides();

        function showslides() {
            let i;
            let slides = document.getElementsByClassName("myslide");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideindex++;
            if (slideindex > slides.length) {
                slideindex = 1;
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideindex - 1].style.display = "block";
            dots[slideindex - 1].className += " active";
            setTimeout(showslides, 2000);
        }
    </script>
    <br>
    <div class="cen">
        <h2 class="god"> Food of The Gods, Freshly Baked!</h2>
        <img src="./images/border.png" style="margin-left: 600px; width:300px;height:20px;">
        <p class="his"> Since 2004, we've been serving our guests the best quality treats, traditionally made and presented with care</p>
        <div class="flx">
            <div class="flxs">
                <b>AUTHENTIC RECIPES</b> <br>
                <p> Our products are based on
                    traditional home-style recipes
                    using fresh ingredients.
                </p><br><br><br><br>
                <b>BAKED WITH LOVE</b>
                <br>
                <p>Our passion for baking is poured into
                    every recipe, serving smiles on a
                    plate everyday.
                </p>
            </div>
            <?php 
             $q = "select * from updates order by id desc limit 1";
             $qus = $cnnt->query($q);
             foreach ($qus as $qes) {
            echo "<img src='./images/".$qes['entrance']."' style='width:400px;height:450px'>";
             }?>
            <div class="flxs">
                <b>COMMITTED TO QUALITY</b> <br>
                <p>
                    From our ingredients to our
                    kitchen operations & guest services,
                    we always prioritize quality.
                    </p><br><br><br><br>
                <b>HONESTLY PRICED</b>
                <br>
                <p>
                    We constantly strive to offer the best
                    products at the right prices.
                </p>
            </div>
        </div>
    </div>
    <!-- About content -->
    <div id="about">
        <h2 id="head">About as</h2>
        <?php
        $q = "select * from updates order by id desc limit 1";
        $qus = $cnnt->query($q);
        foreach ($qus as $qes) {
            echo "<p id='ph'>" . htmlspecialchars($qes['about']) . "</p>";
        } ?>
    </div>
    <!-- Model images -->

    <div id="product">
        <h2 id="head">Our Products</h2>
        <?php
        if (!$cnnt) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result = "SELECT * FROM front_images where id='1'";
        $req = $cnnt->query($result);

        ?>
        <div class="one">

            <?php
            if ($req && $req->num_rows > 0) {
                foreach ($req as $cont) {
                    echo "<div class='item'>";
                    echo "<a href='./menu_items/brownies.php'>";
                    echo "<img class='upimg' src='./uploads/cakes/" . htmlspecialchars($cont['image']) . "'>";

                    echo "<form method='post' action='wishlist.php'>";
                    echo "<input type='hidden' name='product_id'
                 value='" . htmlspecialchars($cont['id']) . "'>";
                    echo "<p id='para'>" . htmlspecialchars($cont['name']) . "</p>";
                    echo "</form>";

                    echo "</div>";
                    // echo "</div>";
                    echo "</a>";
                }
                $result = "SELECT * FROM front_images where id='2'";
                $req = $cnnt->query($result);

            ?>
                <!-- <div class="one"> -->

                <?php
                if ($req && $req->num_rows > 0) {
                    foreach ($req as $cont) {
                        echo "<div class='item'>";
                        echo "<a href='./menu_items/pastries.php.php'>";
                        echo "<img class='upimg' src='./uploads/cakes/" . htmlspecialchars($cont['image']) . "'>";

                        echo "<form method='post' action='wishlist.php'>";
                        echo "<input type='hidden' name='product_id'
                         value='" . htmlspecialchars($cont['id']) . "'>";
                        echo "<p id='para'>" . htmlspecialchars($cont['name']) . "</p>";
                        echo "</form>";

                        echo "</div>";
                        // echo "</div>";
                        echo "</a>";
                    }
                }

                $result = "SELECT * FROM front_images where id='3'";
                $req = $cnnt->query($result);

                ?>
                <!-- <div class="one"> -->

                <?php
                if ($req && $req->num_rows > 0) {
                    foreach ($req as $cont) {
                        echo "<div class='item'>";
                        echo "<a href='menu_items/combo.php'>";
                        echo "<img class='upimg' src='./uploads/cakes/" . htmlspecialchars($cont['image']) . "'>";

                        echo "<form method='post' action='wishlist.php'>";
                        echo "<input type='hidden' name='product_id'
                                 value='" . htmlspecialchars($cont['id']) . "'>";
                        echo "<p id='para'>" . htmlspecialchars($cont['name']) . "</p>";
                        echo "</form>";

                        echo "</div>";
                        // echo "</div>";
                        echo "</a>";
                    }
                }

                $result = "SELECT * FROM front_images where id='4'";
                $req = $cnnt->query($result);

                ?>
                <!-- <div class="one"> -->

            <?php
                if ($req && $req->num_rows > 0) {
                    foreach ($req as $cont) {
                        echo "<div class='item'>";
                        echo "<a href='./menu_items/cookies.php'>";
                        echo "<img class='upimg' src='./uploads/cakes/" . htmlspecialchars($cont['image']) . "'>";

                        echo "<form method='post' action='wishlist.php'>";
                        echo "<input type='hidden' name='product_id'
                 value='" . htmlspecialchars($cont['id']) . "'>";
                        echo "<p id='para'>" . htmlspecialchars($cont['name']) . "</p>";
                        echo "</form>";

                        echo "</div>";
                        // echo "</div>";
                        echo "</a>";
                    }
                }
            } else {
                echo "<p>No products available.</p>";
            }
            ?>
        </div>
    </div>
    <button id="menu"><a href="menu.php">Know More ...</a></button>
    
    <div style="margin-top:50px">
        <a href="https://www.google.com/maps?q=JO's+Patisserie" target="_blank" style="display: inline-block; text-decoration: none;">
            <img src="./uploads/last.jpg" style="margin-left:-40px;height:200px">
        </a>
        <img src="./uploads/line.jpg" style="width:34%;height:200px;margin-left:-50px">
        <a href="user_address.php">
            <img src="./uploads/home.avif" style="width: 20%;height:250px;margin-left:1050px;margin-top:-250px">
        </a>
    </div>
    
    <!-- Shop contact -->
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
            <a href="setting_login.php">Setting</a>
        </div>
        <div>
            <img src="./images/entrance.jpg" alt="Entrance Look" id="image">
        </div>
    </div>
    </form>
</body>

</html>