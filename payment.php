<?php
include './database/db.php';
include './PHPmailer/Mail.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: rgb(240, 219, 219);
            font-family: serif;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .bor {
            border: 8px ridge pink;
            display: flex;
            padding: 30px 350px;
            gap: 100px;
            padding-top: 80px;
        }

        h2 {
            color: darkred;
            text-align: center;
        }

        #select {
            justify-content: center;
            align-items: center;
            font-size: larger;
        }

        #one {
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        .upi {
            font-size: larger;
            color: brown;
            letter-spacing: 1px;
            text-align: center;
        }

        #pay {
            font-size: x-large;
            color: saddlebrown;
            text-align: center;
        }

        .place {
            width: 180px;
            height: 40px;
            margin-left: 120px;
            font-size: larger;
            color: gold;
            background-color: navy;
            border: 2px solid seagreen;
        }

        .wish-item {
            padding-bottom: 100px;
        }

        .upimg {
            width: 300px;
            height: 250px;
            margin: 40px;
        }

        #para {
            font-size: 28px;
            margin-left: 100px;
            color: saddlebrown;
        }

        #para1 {
            font-size: 26px;
            color: saddlebrown;
            margin-left: 150px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    ?>
    <div class="bor">

        <form method="post">
            <h2>Select Payment method</h2>

            <?php

            if (isset($_GET['product_id'])) {
                "Product ID: " . htmlspecialchars($_GET['product_id']);
            }
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                "User ID: " . $user_id;
            } else {
                echo "User ID is not set in the session.";
            }
            ?>

            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($_GET['product_id'] ?? ''); ?>">

            <div id="select">
                <div id="one">
                    <br>
                    <p class="upi" name="payment_method">Cash on delivery
                        <input type="radio" name="payment_method" id="cash" value="Cash on delivery">
                    </p>

                    <h3 id="pay"> Online Payments <i class="fa-solid fa-mobile-screen-button"></i></h3>
                    <p class="upi">Digital Wallets
                        <input type="radio" id="net" name="payment_method" value="digital wallets">
                    </p>
                    <p class="upi"> G-pay
                        <input type="radio" name="payment_method" id="gpay" value="g-pay">
                    </p>
                    <p class="upi">PhonePe
                        <input type="radio" id="Phonepe" name="payment_method" value="phonepe">
                    </p>
                    <p class="upi">Credit Card
                        <input type="radio" id="credit" name="payment_method" value="credit card">
                    </p>
                    <br>
                </div><br><br><br>
                <input type="submit" class="place" name="btn" value="Place order">
        </form>

    </div>
    <?php

    // Product details


    if (isset($_GET['product_id'])) {
        $product_id = htmlspecialchars($_GET['product_id']);
        $qus = "select * from products where id = ?";
        $qes = $cnnt->prepare($qus);

        if ($qes) {
            $qes->bind_param("i", $product_id);
            $qes->execute();
            $store = $qes->get_result();

            if ($store->num_rows > 0) {
                while ($data = $store->fetch_assoc()) {
                    echo "<div class='wish-item'>";
                    echo "<img class='upimg' src='./uploads/cakes/" . htmlspecialchars($data['product_image']) . "'>";
                    echo "<p id='para'>" . htmlspecialchars($data['product_name']) . "</p>";
                    echo "<p id='para1'>$" . htmlspecialchars($data['product_price']) . "</p>";

                    echo "</div>";
                }
            }
        }
    }

    //  Button Event 

    if (isset($_POST['btn'])) {
        if (!empty($_POST['payment_method'])) {
            $product_id = $_GET['product_id'] ?? null; {
                // $product_id = htmlspecialchars($_GET['product_id']);
                  $payment_method = htmlspecialchars($_POST['payment_method']);
                if (isset($_SESSION['user_id'])) {
                    $user = $_SESSION['user_id'];
                    $order = $cnnt->prepare("INSERT INTO orders (user_id, product_id, payment_method) VALUES (?, ?, ?)");
                    $order->bind_param("iis", $user, $product_id, $payment_method);
                    if ($order->execute()) {
                        $mailQuery = "SELECT email FROM users WHERE id = ?";
                        $emailStmt = $cnnt->prepare($mailQuery);
                        $emailStmt->bind_param("i", $user);
                        if ($emailStmt->execute()) {
                            $result = $emailStmt->get_result();
                            $userData = $result->fetch_assoc();
                            if ($userData) {
                                $to = $userData['email'];
                                $subject = "Order Confirmation";
                                $message = "Thank you for your order!";
                                if (send_mail($to, $subject, $message)) {
                                    echo "<script>alert('Order placed and email sent successfully.');
                                    window.location.href='order_product.php';
                                    </script>";
                                } else {
                                    echo "Order placed, but email sending failed.";
                                }
                            } else {
                                echo "Failed to retrieve user email.";
                            }
                        } else {
                            echo "Error executing email query: " . $emailStmt->error;
                        }
                    } else {
                        echo "Error placing the order: " . $order->error;
                    }
                
                } else {
                    echo "User ID is not set in session..";
                }
            }
            //     else {
            //     echo "No Product ID...<br>";
            // }
        } else {
            echo "<script>alert('Please choose a payment method ...')</script>";
        }
    }
    ?>

    </div>
    </div>
</body>

</html>