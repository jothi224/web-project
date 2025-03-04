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
    <link rel="stylesheet" href="./css/sidebar.css">
</head>

<body>
    <!-- Top Bar -->
    <div class="search">
        <input type="search" placeholder="Search" class="srh">
        <i class="fa-solid fa-magnifying-glass" id="icon"></i>

        <div class="not">
            <i class="fa-solid fa-bell"></i>
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="lines"></div>
        <span class="admin">Admin</span>
        <div class="icons">
            <a href="#"> <img src="./images/admin_profile.jpg" id="profile" style="margin-top: 10px;">
            </a>
        </div>
    </div>
    <!-- Side bar -->
    <div id="side">
        <div class="shop">
            <img src="./images/admin_logo.webp" id="logo">
            <p class="con">Jo's Admin</p></a>
        </div>

        <div class="line"></div>
        <br>
        <ul>
            <!-- Dashboard -->
            <li class="nav-item"><a href="dashboard.php" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt" style="color:white;font-size:medium"></i>
                    Dashboard
                </a>
            </li>
            
             <!-- Orders -->
             <li class="nav-item">
                <a href="total_order.php" class="nav-link">
                <i class="fa-solid fa-receipt"></i> Orders</a>
            </li>
            <!-- Product -->
            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="collapse"
                    data-target="#submenu" aria-expanded="true"
                    aria-controls="submenu">
                    <i class="fa-solid fa-image" style="font-size:medium;"></i> Product
                    <i class="fa-solid fa-angle-right" style="color:white;font-size:medium;margin-left:60px"></i>
                </a>
                <div class="sub-menu collapse" id="submenu">
                <a href="add_front_image.php" class="nav-link">
                        <span class="icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </span>
                        <button class="description">Add front images</button>
                    </a>
                   
                    
                <div class="sub-menu collapse" id="submenu">
                <a href="front_image_view.php" class="nav-link">
                        <span class="icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </span>
                        <button class="description">View front images</button>
                    </a>
                    
                    <a href="add_product.php" class="nav-link">
                        <span class="icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </span>
                        <button class="description">Add products</button>
                    </a>
                    <a href="view_product.php" class="nav-link">
                        <span class="icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </span>
                        <button class="description">View products</button>
                    </a>
                </div>
            </li>

            <!-- Users -->
            <li class="nav-item">
                <a href="user_details.php" class="nav-link">
                <i class="fa-solid fa-user"></i> Users</a>
            </li>
       
            <!-- Charts -->
            <li class="nav-item">
                <a href="chart.php" class="nav-link" data-toggle="collapse"
                    data-target="#submenu" aria-expanded="true">
                    <i class="fa-solid fa-chart-line" style="font-size:medium;"></i> Chart
                </a>
            </li>
             <!-- Settings -->
             <li class="nav-item">
                <a href="company_profile.php" class="nav-link" data-toggle="collapse"
                    data-target="#submenu" aria-expanded="true">
                    <i class="fa-solid fa-gears" style="font-size:medium;"></i> Settings

                </a>
                
            </li>
           
            <!-- Components -->
            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="collapse"
                    data-target="#submenu" aria-expanded="true" aria-controls="submenu">
                    <i class="fas fa-fw fa-wrench" style="font-size:medium;"></i> Components
                    <i class="fa-solid fa-angle-right" style="color:white;font-size:medium;margin-left:10px"></i>
                </a>
                <div class="sub-menu collapse" id="submenu">
                    <button class="pages"><a href="#" class="page">Icons</a></button>
                    <button class="pages"><a href="#" class="page">Button</a></button>
                </div>
            </li>
            <!-- Pages -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse"
                    data-target="#submenu" aria-expanded="true" aria-controls="submenu">
                    <i class="fa-solid fa-folder-open" style="font-size:medium;"></i> Pages
                    <i class="fa-solid fa-angle-right" style="color:white;font-size:medium;margin-left:80px"></i>
                </a>

                <div class="sub-menu collapse" id="submenu">

                    <button class="pages"><a href="setting_login.php" class="page">Login</a></button>
                    <button class="pages"><a href="setting_login.php" class="page">Register</a></button>
                    <button class="pages"><a href="setting_login.php" class="page">Cart</a></button>
                    <button class="pages"><a href="setting_login.php" class="page">Wishlist</a></button>
                    <button class="pages"><a href="dash.php" class="page">Order</a></button>
                </div>
            </li>
            </ul>
    </div>
    </div>
</body>

</html>