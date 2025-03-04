<?php
include './database/db.php';
include 'sidebar_setting.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: serif;
        }

        .order {
            margin-left: 450px;

        }

        table,
        tr,
        td,
        th {
            border-collapse: collapse;

            border: 2px solid lightgray;
        }

        th {
            font-size: 23px;
        }

        td {
            font-size: larger;
        }
    </style>
</head>

<body>
    <div class="order">
        <br><br><br><br>
        <table>
            <h1 style="margin-left:300px;"><u>Total orders</u></h1>
            <?php
            $cnt = "SELECT SUM(product_price) AS total_price FROM products";
            $cnts = $cnnt->query($cnt);

            while ($count = mysqli_fetch_array($cnts)) {

                echo "<h2 style='word-spacing:3px;'>Total Sales Amount : " .  $count['total_price'] . "</h2>";
            }
            ?>

            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th style="width: 150px;">Product Price</th>
                    <th style="width: 250px;">User</th>
                </tr>
            </thead>
            <?php
            $query = "
    SELECT 
        users.id AS user_id, 
        users.email, 
        products.product_image, 
        products.product_name, 
        products.product_price, 
        orders.product_id 
    FROM 
        users
    JOIN 
        orders ON users.id = orders.user_id
    JOIN 
        products ON products.id = orders.product_id
";

            $result = $cnnt->query($query);

            foreach ($result as $row) {
                // echo "User ID: " . $row['user_id'] . "<br>";
                // echo "Email: " . $row['email'] . "<br>";
                echo "<tbody><tr>";
                echo "<td style='text-align:center;'><img style='width:200px;height:150px;margin:20px;' src='./uploads/cakes/" . $row['product_image'] . "'></td>";
                echo "<td style='text-align:center;'>" . $row['product_name'] . "</td>";
                echo "<td style='text-align:center;'>" . $row['product_price'] . "</td>";
                echo "<td style='text-align:center;'>" . $row['email'] . "</td>";
                echo "</tr></tbody>";
            } ?>
        </table>
    </div>
</body>

</html>