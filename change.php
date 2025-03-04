<?php
include './database/db.php';
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
            text-decoration: none;
            color: black;
        }

        #icon {
            /* margin-left: 10px; */
            margin: 10px;
        }

        #total {
            margin: 30px;
            line-height: 35px;
            letter-spacing: 2px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $user=$_SESSION['user_id'];
        $out = "select *from user_details where user_id ='$user'";
        $outs = $cnnt->query($out);
    if ($outs && $outs->num_rows > 0) {
        while ($row = $outs->fetch_assoc()) {
    ?>
            <div id="total">

                <?php
                session_start();
                echo $_SESSION['user_id'] .
                    "<br>" .
                    $_SESSION['product_id']; ?>
                <?php echo "<p>" . $row['name'] .
                    "<i class='fa-solid fa-phone' id='icon'></i>" . $row['phone'] . "<br></p>"; ?>
                <?php echo $row['door']; ?>
                <?php echo $row['street'] . "<br>"; ?>
                <?php echo $row['town'] . "<br>"; ?>
                <?php echo $row['district'] . "<br>"; ?>
                <?php echo $row['state'] . "<br>"; ?>
                <?php echo $row['pincode'] . "<br>"; ?>
        <?php echo "<button><a href='order.php?id=" .
                htmlspecialchars($row['id']) . "'>Change</a></button>";
            echo "<br><button><a href='order.php'>Add new address</a></button>";
        }
    } ?>
</body>

</html>