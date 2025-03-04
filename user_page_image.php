<?php
include 'navbar_setting.php';
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
            color: black;
            text-decoration: none;
        }

        #num {
            margin-top: -530px;
            margin-left: 350px;
        }

        table,
        td,
        th {
            border: 3px solid lightslategrey;
        }

        table {
            align-items: center;
            justify-items: center;
            padding: center;
            border-collapse: collapse;
        }

        #total {
            height: 100px;
        }

        #image {
            justify-items: center;
        }

        #name {
            text-align: center;
            width: 100px;
        }

        #price {
            text-align: center;
            width: 100px;
        }

        input {
            width: 100px;
            border: 2px solid black;
            border-radius: 10%;
        }

        .edit {
            border-left: none;
            width: 100px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="num">
        <?php
        $cnnt = mysqli_connect('localhost', 'root', '', 'shop');
        $result = "SELECT * FROM product";
        $req = $cnnt->query($result);
        if ($req) {
        ?>
            <div id="cont"></div>
            <form method="post">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Images</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th colspan="2">Changes</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $imageCount = 0;

                    foreach ($req as $cont) {
                        echo "<tr id='total'>";
                        echo "<td id='image'>";
                        echo "<img src=./uploads/" . htmlspecialchars($cont['image']) . " style='width: 60px; height: 50px; margin: 5px;'>";
                        echo "</td>";
                        echo "<td id='name'>";
                        echo "<p id='para'>" . htmlspecialchars($cont['nam']) . "</p>";
                        echo "</td>";
                        echo "<td id='price'>";
                        echo "<p id='para1'>$" . htmlspecialchars($cont['price']) . "</p>";
                        echo "</td>";
                        echo "<td class='edit'><a href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>Edit</a></td>";
                        echo "<td class='edit'><a href='delete.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>Remove</a></td>";
                        echo "</tr>";
                        $imageCount++;
                    }
                    echo "<h4>Total number of images displayed: $imageCount</h4>";
                    echo "</tbody>";
                    echo "</table>";
                }
                    ?>
            </form>
    </div>
</body>

</html>