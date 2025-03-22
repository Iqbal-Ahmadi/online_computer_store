<?php
include ("functions/function.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online shoping</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <!-- MAIN WRAPPER -->
    <div class="main_wrapper">
        <!-- HEADER STARTS -->
        <div class="header_wrapper">
        
            <nav>
            <div class="logo">
                <span class="bg-orange">Old</span><span class="bg-white">Gold</span>
            </div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="all_products.php">All Products</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                    <li><a href="">Sign Up</a></li>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </nav>
            <div class="form">
                <form action="result.php" method="post">
                    <input type="text" name="user_query" placeholder="search a product" size="25">
                    <input type="submit" name="search" vlaue="search" size="25">
                </form>
            </div>
        </div>
        <!-- CONTENT WRAPPER -->
        <div class="content_wrapper">
        
            <div class="sidebar">
                <div class="sidebar_title">Categories</div>
                <ul class="cats">
                <?php    getcats(); ?>
                </ul>

                <div class="sidebar_title">Brands</div>
                <ul class="cats">
                <?php    getbrands(); ?>  
                </ul>
            </div>
            <div class="content_area">
                <div class="shopping_cart"><span style="float:right; font-size:18px; line-height:40px;">
                    Welcome guest! <b style="color:yellow;">Shopping Cart-</b>Total Item:<?php total_items(); ?> Total Price:<?php total_price(); ?> <a href="cart.php" style="color:yellow; ">Go To Cart</a>
                    </span>
                </div>
                
                   <div class="products_box"> 
    <?php $get_pro="SELECT * FROM products ";
    $run_pro=mysqli_query($conn,$get_pro);
    while($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id=$row_pro['product_id'];
        $pro_cat=$row_pro['product_cat'];
        $pro_brand=$row_pro['product_brand'];
        $pro_title=$row_pro['product_title'];
        $pro_price=$row_pro['product_price'];
        $pro_image=$row_pro['product_image'];
        
        echo"
            <div id='single_product' style='display:inline;float:left;
            margin-left: 20px;
            padding: 10px;'>
            <h3>$pro_title</h3>
            <img src='admin-area/product_images/$pro_image' width='180' height='180'>
            <p><b>price:$pro_price $</b></p>
            <a href='detail.php?pro_id=$pro_id' style='float:left;'>Details</a>
            <a href='index.php?pro_id=$pro_id'><button style='float:right;'>Add To Cart</button></a>

            </div>
        
        ";
    }
        ?><?php cart(); ?>
                   </div>
                   
            </div>
        </div>
        <!-- FOOTER STARTS -->
        <div class="footer">
            <h2 style="text-align:center; padding-top:30px;">&copy; 2022 by www.OnlineTuting.com</h2>
        </div>
    </div>
    
</body>
</html>