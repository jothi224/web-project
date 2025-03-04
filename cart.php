<?php
include './database/db.php';
include 'navbar_user.php';
session_start();
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


<body>
    <h1>Cart
    </h1>
    <br>
    <div id="wishcontent">
        <?php
   if (!isset($_SESSION['user_id'])) {
    echo "<script>
    alert('You must be logged in to cart.');
    window.location.href='login.php';
    </script>";
}

$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : null;
$user_id = $_SESSION['user_id'];
// echo $user_id;
// echo $product_id;
if ($product_id) {
    $sele = $cnnt->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
    if ($sele) {
        $sele->bind_param("ii", $user_id, $product_id);
        $sele->execute();
        $result = $sele->get_result();

        if ($result->num_rows == 0) {
            $insert = $cnnt->prepare("INSERT INTO cart (user_id, product_id) VALUES (?, ?)");
            if ($insert) {
                $insert->bind_param("ii", $user_id, $product_id);
                $insert->execute();
                echo "<script>alert('Product added to Cart!');</script>";
                header("Location: cart.php");
                exit();
            } else {
                echo "<script>alert('Error adding product to Cart.');</script>";
            }
        } else {
            // Product already in the cart
            echo "<script>alert('Product already in your Cart.');</script>";
        }
        $sele->close();
    } else {
        echo "<script>alert('Error preparing SELECT query.');</script>";
    }
} 
// else {
//     echo "<script>alert('Invalid product ID.');</script>";
// }

$qus = "
    SELECT DISTINCT 
        products.product_image, 
        products.product_name, 
        products.product_price, 
        cart.id 
    FROM products
    INNER JOIN cart 
        ON products.id = cart.product_id 
    WHERE cart.user_id = ?
";

        $qes = $cnnt->prepare($qus);
        $qes->bind_param("i",$user_id);
        if ($qes) {
            $qes->execute();
            $store = $qes->get_result();

            if ($store->num_rows > 0) {
                while ($data = $store->fetch_assoc()) {
                    echo "<div class='wish-item'>";
                    echo "<img class='upimg' src='./uploads/cakes/" . htmlspecialchars($data['product_image']) . "'>";
                    echo "<p id='para'>" . htmlspecialchars($data['product_name']) . "</p>";
                    echo "<p id='para1'>$" . htmlspecialchars($data['product_price']) . "</p>";
                    echo "<a href='cart_delete.php?id=" . htmlspecialchars($data['id']) .
                        "'title='Tap to remove' id='remove' title='Tap to remove from cart'><i class='fa-solid fa-heart'></i>
                </a>";

                    echo "</div>";
                }
            } else {
                echo "<p>Your art is empty!</p>";
            }
            $qes->close();
        } else {
            echo "Error preparing the query: " . $cnnt->error;
        }
        ?>

    </div>
    
</body>

</html>