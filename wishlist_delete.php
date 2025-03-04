<?php include './database/db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $result = "SELECT * FROM wishlist where id='$_GET[id]'";
    $req = $cnnt->query($result);
    if ($req) {
        $q = "delete from wishlist where id='$_GET[id]'";
        $res = $cnnt->query($q);
        header("Location:wishlist.php");
    }

    ?>
</body>

</html>