<?php

use function PHPSTORM_META\type;

include './database/db.php';
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
        .file {
            border: 3px solid navy;
            margin-left: 500px;
            background-color: mediumslateblue;
            z-index: 1;
            height: 580px;
            width: 600px;
        }

        #file {
            width: 200px;
            height: 20px;
        }

        #frm {
            margin-left: 100px;
        }

        .price {
            width: 400px;
            height: 40px;
        }

        button {
            font-size: larger;
            color: mediumvioletred;
            width: 150px;
            height: 40px;
            border: 2px dotted navy;
            border-radius: 20px;
            background-color: silver;
        }

        h2 {
            margin-top: -50px;
            margin-left: 200px;
        }
    </style>
</head>

<body>
    <?php
    include 'sidebar_setting.php';

    if (isset($array['id'])) {
        $q = "select * from products where id='$_GET[id]'";
        $data = $cnnt->query($q);
    }
    ?>
    <br><br><br><br><br><br><br>
    <div class="file">
        <h2>Add Product</h2>
        <form method="post" id="frm" enctype="multipart/form-data">
            <br><br><br><br>
            <?php
            if (isset($_GET['id'])) {
                $result = $cnnt->query("SELECT * FROM products WHERE id = '$_GET[id]'");
                $data = $result->fetch_assoc();
            }

            ?>
            <input type="file" name="image" id="file" required><br><br><br>
            <?php if (isset($data['product_image'])) { ?>
                <input type="hidden" name="existing_image"
                    value="<?php echo $data['product_image']; ?>" required>
            <?php } ?>
            <input type="text" placeholder="Product type" name="product_type" class="price"
                required value="<?php echo isset($data['product_type']) ? $data['product_type'] : "" ?>">
            <br><br><br>

            <input type="text" placeholder="Product name" name="product_name" class="price"
                required value="<?php echo isset($data['product_name']) ? $data['product_name'] : "" ?>">
            <br><br><br>
            <input type="text" placeholder="Product price" name="product_price" class="price"
                required value="<?php echo isset($data['product_price']) ? $data['product_price'] : "" ?>">
            <br><br><br>
            <input type="text" placeholder="Product description" name="product_description"
                class="price" value="<?php echo isset($data['nam']) ? $data['product_description'] : "" ?>">
            <br><br><br>

            <button type="submit" name="<?php echo isset($_GET['id']) ? "update" : "Upload" ?>" value="<?php echo isset($_GET['id']) ? $_GET['id'] : "" ?>">
                <?php echo isset($_GET['id']) ? "update" : "Upload" ?>
            </button>
        </form>
        <?php
        if (isset($_POST['Upload'])) {
            // $image = $_POST['existing_image'];
            $type = $_POST['product_type'];
            $nam = $_POST['product_name'];
            $price = $_POST['product_price'];
            $description = $_POST['product_description'];
            if (isset($_FILES['image']['tmp_name'])) {
                $filename = $_FILES["image"]["name"];
                $tempname = $_FILES["image"]["tmp_name"];
                $folder = "../uploads/" . $filename;
            }
            $q = "INSERT INTO products (product_type,product_image, product_name, product_price,product_description) 
                    VALUES ( '$type','$filename','$nam', '$price','$description')";
            $res = $cnnt->query($q);
            // echo "<script>window.location.href='view_product.php'</script>";
            echo "<script>window.location.href='add_product.php'</script>";

        }

        if (isset($_POST['update'])) {
            $type = $_POST['product_type'];
            $nam = $_POST['product_name'];
            $price = $_POST['product_price'];
            // $image = $_POST['existing_image'];
            if (isset($_FILES['image'])) {
                $filename = $_FILES["image"]["name"];
                $tempname = $_FILES["image"]["tmp_name"];
                $folder = "./uploads/" . $filename;
                move_uploaded_file($tempname, $folder);
            }
            $res = mysqli_query($cnnt, "UPDATE products SET 
            product_type='$type',
            product_image='$filename',
             product_name='$nam',
              product_price='$price'
               WHERE id='$_GET[id]'");
            echo "<script>window.location.href='view_product.php'</script>";
        }
        ?>
</body>

</html>