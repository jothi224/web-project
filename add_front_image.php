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
            /* margin-top: -510px; */
            height: 450px;
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
        $q = "select * from front_images where id='$_GET[id]'";
        $data = $cnnt->query($q);
    }
    ?>
    <br><br><br><br><br><br><br>
    <div class="file">
        <h2>Add Product</h2>
        <form method="post" id="frm" enctype="multipart/form-data">
            <br><br><br><br><br><br>
            <?php
            if (isset($_GET['id'])) {
                $result = $cnnt->query("SELECT * FROM front_images WHERE id = '$_GET[id]'");
                $data = $result->fetch_assoc();
            }

            ?>
            <input type="file" name="image" id="file"><br><br><br>
            <?php if (isset($data['image'])) { ?>
                <input type="hidden" name="existing_image" value="<?php echo $data['image']; ?>">
            <?php } ?>
            <input type="text" placeholder="Product name" name="name" class="price" 
            value="<?php echo isset($data['name']) ? $data['name'] : "" ?>"><br><br><br>
            <!-- <input type="text" placeholder="Product price" name="price" class="price" value="<?php echo isset($data['price']) ? $data['price'] : "" ?>"><br><br><br> -->
            <button type="submit" name="<?php echo isset($_GET['id']) ? "update" : "Upload" ?>" value="<?php echo isset($_GET['id']) ? $_GET['id'] : "" ?>">
                <?php echo isset($_GET['id']) ? "update" : "Upload" ?>
            </button>
        </form>
         <?php
                if (isset($_POST['Upload'])) {
                    // $image = $_POST['existing_image'];
                    $nam = $_POST['name'];
                    if (isset($_FILES['image']['tmp_name'])) {
                        $filename = $_FILES["image"]["name"];
                        $tempname = $_FILES["image"]["tmp_name"];
                        $folder = "../uploads/" . $filename;
                    }
                    $q = "INSERT INTO front_images (image, name) VALUES ('$filename', '$nam')";
                    $res = $cnnt->query($q);
                    echo "<script>window.location.href='front_image_view.php'</script>";
                }

                if (isset($_POST['update'])) {
                    $nam = $_POST['name'];
                    $image = $_POST['existing_image'];
                    if (isset($_FILES['image'])) {
                        $filename = $_FILES["image"]["name"];
                        $tempname = $_FILES["image"]["tmp_name"];
                        $folder = "./uploads/" . $filename;
                        move_uploaded_file($tempname, $folder);
                    }
                    $res = mysqli_query($cnnt, "UPDATE front_images SET image='$filename', name='$nam' WHERE id='$_GET[id]'");
                    echo "<script>window.location.href='front_image_view.php'</script>";
                }?>
</body>
</html>