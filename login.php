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
            /* background-color: lightblue; */
            background-image: url('./uploads/cakes/special-recipe.jpg');
            background-repeat: no-repeat;
            background-size: 100% 800px;
            font-family: serif;
        }
        h1{
            color: wheat;
            text-align: center;
        }
        .first{
            width: 450px;
            height: 580px;
            margin-left: 650px;
            margin-top: 30px;
            border: 2px solid white;
            box-shadow: 2px 10px 5px whitesmoke,2px 12px 5px  black;
            border-radius: 20px;
        }
        form{
            margin-left: 50px;
        }
        label{
            font-size: x-large;
            color:white;
        }
        input{
            margin: 30px;
            padding:5px;
            width: 250px;
            height: 30px;
            font-size: large;
            border: 3px solid none;
        }
        #login{
            font-size: x-large;
            height: 40px;
            width: 250px;
            background-color: gray;
            border-color:black;
        }
        button{
            margin-left: 30px;
            border: none;
            background-color: transparent;
            font-size: 18px;
        }
        a{
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>
    <div class="first"><br>
        <h1>Login </h1><br><br>
        <form method="post">
        <label>E-Mail</label><br>
        <input type="email" name="email" id="email" placeholder="Enter a e-mail" required><br>
        <label>Password</label><br>
        <input type="password" name="password" id="pass" placeholder="Enter password"><br>
        <input type="submit" value="Login" name="login" id="login"><br>
        <button><a href="register.php">Don't Have id?</a></button>
        <button name="forget"><a href="register.php">Forgot Password  !</a></button>
    </form>

    <?php
session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
       
            if(isset($_POST['login']))
            {   
                $email=$_POST['email'];
                $password=$_POST['password'];

                $in = $cnnt->prepare("SELECT * FROM users WHERE email=?");
                $in -> bind_param("s",$email);
                $in->execute();
                $ins=$in->get_result();

                if ($ins->num_rows > 0) {
                   
                    $data = $ins->fetch_assoc();
            
                    if($data['email']==$email && $data['password']==$password){

                        $_SESSION['user_id']=$data['id'];
                                                header('Location:first.php');
                        }                    
                    else{
                        echo "<script>alert('incorrect')</script>";
                    }}               
                }
               }
                 ?>


    </div>
</body>
</html>