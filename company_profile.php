<?php
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
        .total{
            margin-left: 300px;
        }
        #total {
            display: flex;
            /* margin: 30px; */
        }

        img {
            width: 200px;
            height: 100px;
        }

        p {
            width: 500px;
            text-align: justify;
            line-height: 2;
            font-size: large;
        }

        #first {
            width: 300px;
        }

        #third {
            margin-left: 60px;
        }

        a {
            text-decoration: none;
            font-size: large;
            color: black;
        }

        button {
            width: 100px;
            height: 30px;
        }
    </style>
</head>

<body>
    <div class="total">
        <br><br><br><br>
        <?php
        $cnnt = mysqli_connect('localhost', 'root', '', 'shop');
        $q = "select * from updates order by id desc limit 1";
        $qus = $cnnt->query($q);
        foreach ($qus as $qes) { ?>
            <div id="total">
                <div id="first">
                    <h3>Brand Name</h3> <?php echo $qes['brand']; ?>
                    <h3>Mobile</h3> <?php echo $qes['mobile']; ?>
                    <h3> E-Mail</h3> <?php echo $qes['email']; ?>
                    <h3>Logo</h3> <?php echo "<img src='./uploads/" . htmlspecialchars($qes['logo']) . "'>"; ?>
                    <h3>Ambition</h3> <?php echo "<img src='./uploads/" . htmlspecialchars($qes['entrance']) . "'>"; ?>
                </div>
                <div id="second">
                    <h3>About</h3> <?php echo "<p>" . $qes['about'] . "</p>"; ?>
                    <?php echo "<br><br><button><a href='company_profile_edit.php?id=" . htmlspecialchars($qes['id']) . "'>Edit</a></button>";
                    echo "<button><a href='company_profile_edit.php'>Update</a></button>";
                    ?>
                </div>
                <div id="third">
                    <h3> Door Number</h3> <?php echo $qes['door']; ?>
                    <h3> Street</h3> <?php echo $qes['street']; ?>
                    <h3> Town</h3> <?php echo $qes['Town']; ?>
                    <h3>District</h3> <?php echo $qes['district']; ?>
                    <h3>State</h3> <?php echo $qes['states']; ?>
                    <h3>Pincode</h3> <?php echo $qes['pincode'];
                                    } ?>
                </div>
            </div>
    </div>
</body>

</html>