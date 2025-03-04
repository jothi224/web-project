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

    <link rel="stylesheet" href="./css/dash.css">
</head>

<body>
    <?php
    include 'sidebar_setting.php';
    ?>
    <br><br>
    <div id="to">
        <!-- User count -->
        <div id="maxid"><?php
                        $q = mysqli_query($cnnt, "SELECT MAX(id) AS highest_id FROM users");
                        if ($q) {
                            $row = mysqli_fetch_assoc($q);
                            $highest_id = $row['highest_id'];
                            echo "<br><i class='fa-solid fa-users' id='users'></i>
                        <br><p id='user'>USERS</p><p id='user_count'>" .
                                $highest_id . "</p>";
                        } ?>
        </div>
        <!-- Products -->
        <div id="count">
            <?php
            $data = mysqli_query($cnnt, "SELECT MAX(id) AS highest_id  FROM products");

            $res = mysqli_fetch_assoc($data);
            
            $highest_id = $res['highest_id'];
            echo "<br>
                 <i class='fa-solid fa-cake' id='users'></i><br>
                 <p id='product'>Own Product </p>  
               
                <div id='user_count'>$highest_id </div>";
                 ?>
        </div>
        <!-- Order -->
        <div class="order">
        <?php
            $data = mysqli_query($cnnt, "SELECT MAX(id) AS highest_id  FROM orders");

            $res = mysqli_fetch_assoc($data);
            
            $highest_id = $res['highest_id'];
            echo "<br>
                 <i class='fa-solid fa-cake'></i><br>
                 <p id='product'>Own Product </p>  
               
                <div id='user_count'>$highest_id </div>";
                 ?>
        </div>
    </div>

</body>

</html>