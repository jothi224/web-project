<?php
include './database/db.php';
// include 'navbar_user.php';
include './PHPmailer/Mail.php';
session_start();
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
            background-color: rgb(240, 172, 172);
        }

        #heading {
            letter-spacing: 2px;
            text-align: center;
            font-size: x-large;
            font-family: 'Times New Roman', Times, serif;
        }

        #lines {
            width: 500px;
            height: 5px;
            border: solid 5px #000;
            border-color: #000 transparent transparent transparent;
            border-radius: 200%;
        }

        #total {
            margin-top: -380px;
            line-height: 35px;
            letter-spacing: 2px;
            margin-left: 450px;
        }

        a {
            text-decoration: none;
            font-size: large;
            color: sienna;
        }

        #icon {
            margin: 10px;
        }

        .bor {
            border: 8px solid white;
        }

        .upimg {
            width: 300px;
            height: 250px;
        }

        #para {
            margin-left: 20px;
            font-size: x-large;
        }

        #para1 {
            margin-left: 80px;
            font-size: x-large;
        }

        #continue {
            margin-left: 120px;
            margin-top: -50px;
            font-size: larger;
        }

        form {
            margin-left: 300px;
        }

        p {
            font-size: x-large;
            font-family: 'Times New Roman', Times, serif;
            /* color:rgba(228, 83, 73, 0.98); */
            color: maroon;
            text-align: justify;
        }

        #change {
            width: 120px;
            height: 30px;
            border: 2px solid saddlebrown;
            /* background-color:rgb(211, 238, 240); */
            color: white;
        }

        #new {
            margin-top: -50px;
            margin-left: 10px;
            height: 30px;
            border: 2px solid saddlebrown;
        }

        #payment {
            margin-top: 10px;
            margin-left: 40px;
            height: 30px;
            border: 2px solid saddlebrown;
        }

        .wish-item {
            margin-top: 20px;
            margin-left: 900px;
        }
    </style>
</head>

<body>
    <div class="bor">
        <p id="heading">Check your Address and Product</p>
        <hr id="lines">
        <?php

        // View selected product
        if (isset($_POST['product_id'])) {
            $product_id = htmlspecialchars($_POST['product_id']);
            $pro = $cnnt->prepare("select * from products where id = ?");
            $pro->bind_param("i", $product_id);
            $pro->execute();
            $pros = $pro->get_result();
            if ($pros && $pros->num_rows > 0) {
                while ($data = $pros->fetch_assoc()) {
                    echo "<div class='wish-item'>";
                    echo "<img class='upimg' src='./uploads/cakes/" . htmlspecialchars($data['product_image']) . "'>";
                    echo "<p id='para'>" . htmlspecialchars($data['product_name']) . "</p>";
                    echo "<p id='para1'>$" . htmlspecialchars($data['product_price']) . "</p>";
                    echo "</div>";
                }
            }
        } else {
            echo "not set";
        }



        ?>
        <div id="total">
            <?php
            // Show user and user address
            if (!isset($_SESSION['user_id'])) {
                echo "<script>
                alert('You must be logged in to cart.');
                window.location.href='login.php';
                </script>";
            }
            $user = $_SESSION['user_id'];

            $stmt = $cnnt->prepare("SELECT * FROM user_details WHERE user_id = ?");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $outs = $stmt->get_result();

            if ($outs && $outs->num_rows > 0) {
                while ($row = $outs->fetch_assoc()) {
                    $use = $cnnt->prepare("select * from users where id=?");
                    $use->bind_param("s", $user);
                    $use->execute();
                    $uses = $use->get_result();
                    if ($uses && $uses->num_rows > 0) {
                        while ($used = $uses->fetch_assoc()) {

            ?>

                            <?php
                            echo "<p>E-mail : " . htmlspecialchars($used['email']) . "</p>";
                            echo "<p>Name :" . htmlspecialchars($row['name']) . "</p>";
                            echo "<p>Address :" . htmlspecialchars($row['door'])  .
                                htmlspecialchars($row['street']) . "</p>";
                            echo "<p>Town :" . htmlspecialchars($row['town']) . "</p>";
                            echo "<p>District :" . htmlspecialchars($row['district']) . "</p>";
                            echo "<p>State :" . htmlspecialchars($row['state']) . "</p>";
                            echo "<p>Pincode :" . htmlspecialchars($row['pincode']) . "</p>";
                            echo "<p>Phone number :" . htmlspecialchars($row['phone']) . "</p>";
                            ?>
                            <button id="change">
                                <a href="address_edit.php?id=<?= htmlspecialchars($row['id']) ?>&product_id=<?= htmlspecialchars($_POST['product_id'] ?? '') ?>">Change <i class="fa-solid fa-pen"></i></a>

                            </button>

                            <button id="new">
                            <a href="address_edit.php?id=&product_id=<?= htmlspecialchars($_POST['product_id'] ?? '') ?>">Add new Address <i class="fa-solid fa-pen"></i></a>

                            </button>
                            <br>

                            <button id="payment">
                                <a href="payment.php?product_id=
            <?php echo isset($_POST['product_id']) ? htmlspecialchars($_POST['product_id']) : ''; ?>">
                                    Proceed to payment
                                </a>
                            </button>

        </div><br>
<?php
                        }
                    }
                }
            } else {
                echo "<p>No user details found. Please add your address information.</p>";
                echo "<script>
        window.location.href = 'address_edit.php?product_id=" . htmlspecialchars($_POST['product_id']) . "';
            </script>";
            }
            $stmt->close();
            $cnnt->close();
?>

    </div>
    </div>
</body>

</html>