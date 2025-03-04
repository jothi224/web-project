<?php 
include './database/db.php';
include 'sidebar_setting.php' ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            position: relative;
            font-family: serif;
        }
        form{
            width: 400px;
            height: 200px;
            position: absolute;
            margin-top: 100px; 
            margin-left: 400px;
            }
        #abot{
            width: 250px;
            height: 30px;
            font-size: 20px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            letter-spacing: 2px;
            line-height: 2.2;
            border:2px solid teal;
            overflow: hidden;
            text-align: justify;
        }
        .up{
            border: 3px solid darkslateblue;
            width: 300px;
            height: 50px;
            font-size: x-large;
            text-align: center;
            letter-spacing: 2px;
            color:blue;
            font-weight: bold;
            margin-left: 200px;
            background-color:steelblue;
        }
        .up::after{
            background-image: url(./images/open.gif);
        } 
        #tot{
            display:grid;
            grid-template-columns: repeat(2,1fr);
            grid: 15px;
        }
        #second{
            margin-left: 150px;
        }
        .cons {
                border: 2px solid teal;
                width: 250px;
                height: 30px;
                color: black;
                font-size: large;
        }
        .crt{
            width: 200px;
            height: 40px;
            margin-left: 200px;
            margin-top: 30px;
            font-size: x-large;
            background-color: transparent;
            border: 3px solid black;
        }
        .crt:hover{
            background-color: black;
        }
        .but{
            width: 200px;
            height: 30px;
            text-align: center;
            letter-spacing: 2px;
            border: 3px solid black;
            background-color: lightgray;
            margin-left: 200px;
            font-size: larger;
        }
    </style>
</head>
<body>
        <?php
    if (isset($_GET['id'])) 
    {
        $result = $cnnt->query("SELECT * FROM updates WHERE id = '$_GET[id]'");
                $data = $result->fetch_assoc();
    }
    ?>
    <form method="post" enctype="multipart/form-data">
          <div id="tot">
              <div id="first">
                <h3>Brand Name</h3>
                <input type="text" name="brand" class="cons" value="<?php echo isset($data['brand'])? $data['brand']:""; ?>"> 
                <h3>Mobile Number</h3>
                <input type="text" name="mobile" class="cons" value="<?php echo isset($data['mobile'])? $data['mobile']:""; ?>">
                <h3>Email</h3>
                <input type="email" name="email" class="cons" value="<?php echo isset($data['email'])? $data['email']:""; ?>"><br>
                <h3>About</h3>
                <textarea name="about" id="abot" placeholder="Type a Content"><?php echo isset($data['about'])? $data['about']:""; ?></textarea><br>        
                <h3>Logo</h3>
                <input type="file" name="logo"><br><br>
                <h3>Entrance Photo</h3>
                <input type="file" name="entrance" id="entrance">
            </div>
            <div id="second">
                <h3>Door Number</h3>
                <input type="text" name="door" class="cons" value="<?php echo isset($data['door'])? $data['door']:""; ?>"><br>
                <h3>Street</h3>
                <input type="text" name="street" class="cons" value="<?php echo isset($data['street'])? $data['street']:""; ?>"><br>
                <h3>Town</h3>
                <input type="text" name="Town" class="cons" value="<?php echo isset($data['Town'])? $data['Town']:""; ?>"><br>
                <h3>District</h3>
                <input type="text" name="district" class="cons" value="<?php echo isset($data['district'])? $data['district']:""; ?>"><br>
                <h3>State</h3>
                <input type="text" name="state" class="cons" value="<?php echo isset($data['states'])? $data['states']:""; ?>"><br>
                <h3>Pincode</h3>
                <input type="text" name="pincode" class="cons" value="<?php echo isset($data['pincode'])? $data['pincode']:""; ?>"><br> 
            </div>
        </div><br><br>
        <button type="submit" class="but" name="<?php echo isset($_GET['id']) ? "Edit" : "Update" ?>" value="<?php echo isset($_GET['id']) ? $_GET['id'] : "" ?>">
            <?php echo isset($_GET['id']) ? "Edit" : "Update" ?>
            </button>   <br><br>     
         <?php
         if(isset($_POST['Update']))
         {
            $brand=$_POST['brand'];
            $about=$_POST['about'];
            $door=$_POST['door'];
            $street=$_POST['street'];
            $town=$_POST['Town'];
            $district=$_POST['district'];
            $state=$_POST['state'];
            $pin=$_POST['pincode'];
            $mobile=$_POST['mobile'];
            $email=$_POST['email'];
            
        if (isset($_FILES['logo'])) { 
            $filename = $_FILES["logo"]["name"];
            $tempname = $_FILES["logo"]["tmp_name"];
            $folder = "./uploads/" . $filename;
            move_uploaded_file($tempname, $folder);
        }
        if (isset($_FILES['entrance'])) { 
            $files = $_FILES["entrance"]["name"];
            $tempname = $_FILES["entrance"]["tmp_name"];
            $folder = "./uploads/" . $files;
            move_uploaded_file($tempname, $folder);
        }
                  $in = "insert into updates (brand,about,door,street,Town,district,states,pincode,mobile,email,logo,entrance) values ('$brand','$about','$door','$street','$town','$district','$state','$pin','$mobile','$email','$filename','$files')";
                  $ins=$cnnt->query($in);
                echo "<script>window.location.href='company_profile.php'</script>";
            }
                if(isset($_POST['Edit']))
                {
                    $brand=$_POST['brand'];
                    $about=$_POST['about'];
                    $door=$_POST['door'];
                    $street=$_POST['street'];
                    $town=$_POST['Town'];
                    $district=$_POST['district'];
                    $state=$_POST['state'];
                    $pin=$_POST['pincode'];
                    $mobile=$_POST['mobile'];
                    $email=$_POST['email'];
                    
                if (isset($_FILES['logo'])) { 
                    $filename = $_FILES["logo"]["name"];
                    $tempname = $_FILES["logo"]["tmp_name"];
                    $folder = "./uploads/" . $filename;
                    move_uploaded_file($tempname, $folder);
                }
                if (isset($_FILES['entrance'])) { 
                    $filename = $_FILES["entrance"]["name"];
                    $tempname = $_FILES["entrance"]["tmp_name"];
                    $folder = "./uploads/" . $filename;
                    move_uploaded_file($tempname, $folder);
                }
                $q = "SELECT * FROM updates ORDER BY id DESC LIMIT 1";
            $qus = $cnnt->query($q);
            $res = mysqli_query($cnnt,"UPDATE updates SET brand='$brand', about='$about', door='$door', street='$street', Town='$town', district='$district', states='$state', pincode='$pin', mobile='$mobile', email='$email', entrance='$filename' WHERE id='$_GET[id]'");
            echo "<script>window.location.href='company_profile.php'</script>";
                        }
         ?>
    </form>    
</body>
</html>