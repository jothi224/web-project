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
    <style>
        body{
      font-family:serif;
        }
        a {
            color: black;
            text-decoration: none;
        }

        #num {
            /* margin-top: -9px; */
            position: relative;
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
    
    <!-- brownie -->
<?php
    $result = "select * from products where product_type='brownie'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of Brownie displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>

    <!-- Pastry -->

<?php
    $result = "select * from products where product_type='pastry'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of Pastry displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>

    <!-- Combo -->
<?php
    $result = "select * from products where product_type='combo'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of  Combo displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>

    <!-- Cookie -->
<?php
    $result = "select * from products where product_type='cookies'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of Cookies displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>

    <!-- Pie -->
<?php
    $result = "select * from products where product_type='pie'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of Pie displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>

    <!-- Puff -->
<?php
    $result = "select * from products where product_type='puff'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of Puff displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>

    <!-- Sandwich -->
<?php
    $result = "select * from products where product_type='sandwich'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of Sandwich displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>

    <!-- Cakes -->
<?php
    $result = "select * from products where product_type='cakes'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of Cakes displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>


    <!-- Bread -->
<?php
    $result = "select * from products where product_type='bread'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of Bread displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>

    <!-- Juice -->
<?php
    $result = "select * from products where product_type='juice'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of Fresh Juice displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>
                                        
    <!-- Mousse -->
<?php
    $result = "select * from products where product_type='mousse'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of Mousse displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>

    <!-- Milk shake -->
<?php
    $result = "select * from products where product_type='milkshake'";
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
            <th style="font-weight: 400;">Price</th>
            <th style="font-weight: 400;">Varieties</th>
            <th style="font-weight: 400;">Description</th>
            <th style="font-weight: 400;">Changes</th>
        </tr>
     </thead>
     <tbody>
        <?php
            $imageCount = 0;
        foreach ($req as $cont) {
            echo "<tr id='total'><td><img id='image' src='./uploads/cakes/" . htmlspecialchars($cont['product_image']) . "' style='width: 160px; height: 150px;'></td>";
            echo "<td id='name'><p id='para'>" . htmlspecialchars($cont['product_name']) . "</p></td>";
            echo "<td id='name'><p id='para'>Rs." . htmlspecialchars($cont['product_price']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_type']) . "</p></td>";
            echo "<td id='price'><p id='para1'>" . htmlspecialchars($cont['product_description']) . "</p></td>";

            echo "<td class='edit'>
                <a title='Tap to Edit' href='add_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-pen' id='edit'></i></a>
                <a title='Tap to remove' href='remove_product.php?id=" . htmlspecialchars($cont['id']) . "' style='color: black;'>
                <i class='fa-solid fa-trash-arrow-up' id='remove'></i></a></td>";
            echo "</tr>";
            $imageCount++;
        }
            echo "<h4 id='count'>Number of Milk Shake displayed in Webpage: $imageCount</h4>";
     echo "</tbody>";
    echo "</table>";
        }
        ?>
        </form>
        </div>
</div>



</body>

</html>