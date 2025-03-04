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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<Style>
    body{
      font-family:serif;
    }
    a {
            color: black;
            text-decoration: none;
        }

        #num {
            /* margin-top: -9px; */
            position:relative;
            margin-left: 350px;
        }

        #count {
            font-weight: normal;
            font-size: large;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        table,
        td,
        th {
            border: 1px solid lightgray;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        table {
            align-items: center;
            justify-items: center;
            padding: center;
            border-collapse: collapse;
        }

        #total {
            height: 150px;
            align-items: center;
        }

        #image {
            margin-left: 80px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #name {
            text-align: center;
            width: 150px;
            letter-spacing: 1px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        #price {
            text-align: center;
            width: 130px;
            letter-spacing: 1px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        #edit {
            color: coral;
            margin-left: -5px;
        }

        #edit:hover {
            alt: Edit;
        }

        #remove {
            color: lightcoral;
            margin-left: 10px;
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
<?php
    $cnnt = mysqli_connect('localhost', 'root', '', 'shop');
    $result = "SELECT * FROM front_images";
    $req = $cnnt->query($result);
    if ($req) {
    ?>

        <div id="num">
            <div id="cont"></div>
            <br><br><br><br><br>
            <form method="post">
                <table border="1" style="width: 700px;">
                    <thead>
                        <tr style="height: 50px;width:200px;font-size:large;">
                            <th style="font-weight: 400;">Images</th>
                            <th style="font-weight: 400;">Name</th>

                            <th style="font-weight: 400;">Changes</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $imageCount = 0;

                    foreach ($req as $cont) {
                        echo "<tr id='total'>";
                        echo "<td style='width:200px';>";
                        echo "<img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['image']) . "' style='width: 160px; height: 150px;'>";
                        echo "</td>";
                        echo "<td id='name'>";
                        echo "<p id='para'>" . htmlspecialchars($cont['name']) . "</p>";
                        echo "</td>";

                        echo "<td class='edit'>
                <a title='Tap to Edit' href='add_front_image.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                    <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                    <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
                        echo "</tr>";
                        $imageCount++;
                    }
                    echo "<h4 id='count'>Number of images displayed in Webpage: $imageCount</h4>";
                    echo "</tbody>";
                    echo "</table>";
                }
                    ?>
            </form>
        </div>

</body>
</html>