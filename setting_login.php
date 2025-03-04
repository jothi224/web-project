<?php
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
            background-color:rgb(1, 10, 27);
            background: radial-gradient( circle at center ,lightgrey,black);
            /* background-image: url('./images/set_log.jpg');
            background-repeat: no-repeat;
            background-size: 100% 700px; */
            font-family: serif;
        }
        #btn {
      width: 200px;
      height: 70px;
      margin-left: 130px;
      margin-top: 10px;
      font-size: x-large;
      background: radial-gradient(lightblue, teal);
      border-radius: 20%;
      box-shadow: 0 10px 80px rgba(194, 194, 196, 0.5);
      animation: float 3s infinite ease-in-out;
      color: maroon;
     }

    @keyframes float {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-20px);
      }
    }
        h1{
            color: darkolivegreen;
            text-align: center;
        }
        form{
            /* margin-left: 50px; */
            width: 450px;
            height: 400px;
            margin-left: 540px;
            margin-top: 150px;
            border: 2px solid white;
            box-shadow: 2px 10px 5px whitesmoke,2px 12px 5px  black;
            border-radius: 20px;
            
        }
        label{
            font-size: x-large;
            color:white;
        }
        .nums{
            margin: 30px;
            width: 250px;
            height: 35px;
            font-size: large;
            border: 3px solid black;
            margin-left: 90px;
        }
        #login{
            font-size: x-large;
            height: 40px;
            width: 250px;
            background-color: gray;
            border-color:cornflowerblue;
        }
        a{
            text-decoration: none;
            color:white;
        }
    </style>
</head>

<body>

        <form method="post">
        <h1>Amin Login</h1>

            <input type="email" name="mail" class="nums" placeholder="Email">
            <input type="password" class="nums" placeholder="Enter a password" name="pass">
            <input type="submit" name="btn" value="Login" id="btn">
    </form>
    <?php
    if (isset($_POST['btn'])) {

        $mail =$_POST['mail'];
        $pass = $_POST['pass'];
        
        $q = "select * from admin_lock";
        $d = $cnnt->query($q);
        foreach($d as $data){
            if ($data['email']==$mail && $data['password']== $pass) {
                header('Location:dashboard.php');
            } 
            else {
                echo "<script>alert('Incorrect Email or Password')</script>";
            }
        }
    }
    ?>

</body>

</html>