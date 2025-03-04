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
        #total {
            margin-left: 280px;
        }
        table
         {
            width: 1200px;
            border-collapse: collapse;
        }
        h1{
            margin-left: 350px;
        }
        tr,td,th{
            border :2px solid lightgrey;
        }
    </style>
</head>

<body>
    <br><br><br><br><br><br>
    <div id="total">
        <table>
        <h1>User Details</h1>

            <thead>
                <tr>
                    <th style="width: 150px;">Name</th>
                    <th>Email Id</th>
                    <th>Password</th>
                    <th>Address</th>
                    <th>Pincode</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Mobile Number</th>
                </tr>
            </thead>
        <?php

        $qus = "SELECT  
            users.email, 
            users.password,
            user_details.name,user_details.door, 
            user_details.street, user_details.town, 
            user_details.district, user_details.state, 
            user_details.phone,user_details.pincode ,user_details.user_id
            FROM users LEFT JOIN user_details 
            ON 
            users.id = user_details.user_id
            where users.id";
        $qes = $cnnt->query($qus);
        foreach ($qes as $row) {
            echo "<tr><td style='text-align:center'><p>" . htmlspecialchars($row['name']) . "</p></td>";

            echo "<td style='text-align:center'><p>" . htmlspecialchars($row['email']) . "</p></td>";
            echo "<td style='text-align:center'><p>" . htmlspecialchars($row['password']) . "</p></td>";
            echo "<td style='text-align:center;word-spacing:3px;'><p>" .($row['door']) .",". ($row['street']) .($row['town']) . "</td>";
            echo "<td style='text-align:center'>".htmlspecialchars($row['pincode'])."</td>";

            echo "<td style='text-align:center'>".($row['district']) . "</td>";
          echo  "<td style='text-align:center'>" .htmlspecialchars($row['state']) . "</td>";
            echo "<td style='text-align:center'>" .htmlspecialchars($row['phone'])."</td>";
        }

        ?>
</table>
        
</body>


</html>