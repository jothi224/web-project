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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/wishlist.css">
</head>
<?php
session_start();
?>

<body>
    <h1>Wishlist
    </h1>
    <br>
<!-- Product -->
<div id="wishcontent">
        <?php

        if (!isset($_SESSION['user_id'])) {
            echo "<script>alert('You must be logged in to Wishlist.');</script>";
            header("Location: login.php");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['product_id'])) {
                $product_id = htmlspecialchars($_POST['product_id']);
            }
        }
        $product_id = $_POST['product_id'] ?? null;
        $user = $_SESSION['user_id'];

        if ($product_id) {
            $sele = $cnnt->prepare("SELECT * FROM wishlist WHERE user_id=? and product_id = ?");
            if ($sele) {
                $sele->bind_param("ii", $user, $product_id);
                $sele->execute();
                $result = $sele->get_result();
                if ($result->num_rows == 0) {
                    $insert = $cnnt->prepare("INSERT INTO wishlist (user_id,product_id) VALUES (?,?)");
                    if ($insert) {
                        $insert->bind_param("ii", $user, $product_id);
                        $insert->execute();
                        echo "<script>alert('Product added to wishlist!')</script>";
                        header("Location:first.php");
                    } else {
                        echo "Error adding product to wishlist!";
                    }
                } else {
                    echo "<script>alert('Product already in your wishlist.')</script>";
                }
            } else {
                echo "Error in query preparation.";
            }
}
//Merge Product
    $qus = "
        SELECT DISTINCT 
            products.product_image, 
            products.product_name, 
            products.product_price, 
            wishlist.id 
        FROM products
        INNER JOIN wishlist 
            ON products.id = wishlist.product_id 
        WHERE wishlist.user_id = ?";


        $qes = $cnnt->prepare($qus);

        if ($qes) {
            $qes->bind_param("i", $user);
            $qes->execute();
            $store = $qes->get_result();

            if ($store->num_rows > 0) {
                while ($data = $store->fetch_assoc()) {
                    echo "<div class='wish-item'>";
                    echo "<img class='upimg' src='./uploads/cakes/" . htmlspecialchars($data['product_image']) . "'>";
                    echo "<p id='para'>" . htmlspecialchars($data['product_name']) . "</p>";
                    echo "<p id='para1'>$" . htmlspecialchars($data['product_price']) . "</p>";
                    echo "<a href='wishlist_delete.php?id=" . htmlspecialchars($data['id']) .
                        "'title='Tap to remove from wishlist' id='remove'><i class='fa-solid fa-heart'></i>
                </a>";

                    echo "</div>";
                }
            } else {
                echo "<p>Your wishlist is empty!</p>";
            }
            $qes->close();
        } else {
            echo "Error preparing the query: " . $cnnt->error;
        }
        ?>

    </div>
</body>

</html>