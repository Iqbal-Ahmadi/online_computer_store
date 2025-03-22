<?php
$conn=mysqli_connect("localhost","root","","ecommerce");

if(mysqli_connect_errno()){
    echo "failed to connect to MYSQLI:" .mysqli_connect-errno();
}



function getRealIpAddr(){
     $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP']) ) {
     $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
     $ip = $_SERVER['HTTPX_FORWARDED_FOR'];
    }
    return ($ip =="::1") ? 1 : 0;
   }

// function cart(){
//     if(isset($_GET['add_cart'])){

//         global $conn;
//         $ip=getRealIpAddr();
//         $qty = $_GET['qun'];
         
//         $pro_id=$_GET['add_cart'];
//         $check_pro="SELECT * from cart where ip_add=$ip and p_id=$pro_id";
//         $run_check=mysqli_query($conn,$check_pro);
//         if(mysqli_num_rows($run_check)>0){
//             echo "<h2>you have added once</h2>";
//         }
//         else{
//             $insert_pro="INSERT into cart(p_id,ip_add,qty) values('$pro_id','$ip','$qty')";
//             $run_pro=mysqli_query($conn,$insert_pro);
//             echo "<script>window.open('index.php','_self')</script>";
//         }
//     }

//getting total items
function total_items(){
    if(isset($_GET['add_cart'])){
    global $conn;
    $ip=getRealIpAddr();
    $get_items="SELECT * from cart where ip_add='$ip'";
    $run_items=mysqli_query($conn,$get_items);
    $count_items=mysqli_num_rows($run_items);
    }
    else{
        global $conn;
        $ip=getRealIpAddr();
        $get_items="SELECT * from cart where ip_add='$ip'";
        $run_items=mysqli_query($conn,$get_items);
        $count_items=mysqli_num_rows($run_items);
    }
    echo " $count_items ";
}
//getting total price in the cart
function total_price(){
    $total=0;
    global $conn;
    $ip=getRealIpAddr();
    $sel_price="select * from cart where ip_add='$ip'";
    $run_price=mysqli_query($conn,$sel_price);
    while($p_price=mysqli_fetch_array($run_price)){
        $pro_id=$p_price['p_id'];
        $pro_price="select * from products where product_id='$pro_id'";
        $run_pro_price=mysqli_query($conn,$pro_price);
        while($pp_price=mysqli_fetch_array($run_pro_price)){
            $product_price=array($pp_price['product_price']);
            $values=array_sum($product_price);
            $total+=$values;

        }
    }
    echo " $.$total  ";
}
// getting categories
function getCats(){
    global $conn;
    $get_cats="SELECT * FROM categories";
    $run_cats=mysqli_query($conn,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats)){

        $cat_id=$row_cats['cat_id'];
        $cat_title=$row_cats['cat_title'];
        echo "<li class='dropdown-menu-links w-100 border-bottom p-2 ms-0  position-relative transition-05'  ><a class='text-decoration-none link-dark ps-2' href='index.php?cat=$cat_id'>$cat_title</a></li>";
    }

}
// getting the brands
function getbrands(){
    global $conn;
    $get_brands="SELECT * FROM brands";
    $run_brands=mysqli_query($conn,$get_brands);
    while($row_brands=mysqli_fetch_array($run_brands)){

        $brand_id=$row_brands['brand_id'];
        $brand_title=$row_brands['brand_title'];
        echo "<li class='dropdown-menu-links w-100 border-bottom p-2 ms-0  position-relative transition-05'><a class='text-decoration-none link-dark ps-2' href='index.php?brand=$brand_id'>$brand_title</a></li>";
    }

}

function getcatpro(){
    if(isset($_GET['cat'])){
        $cat_id=$_GET['cat'];
    global $conn;
    $get_cat_pro="SELECT * FROM products where product_cat=$cat_id";
    $run_cat_pro=mysqli_query($conn,$get_cat_pro);
    $count_cats=mysqli_num_rows($run_cat_pro);
    if($count_cats==0){
        echo "<h2 style='padding: 20px;'>There is no product in this category!<h2>";
        // exit();
    }
        while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
            $pro_id=$row_cat_pro['product_id'];
            $pro_cat=$row_cat_pro['product_cat'];
            $pro_brand=$row_cat_pro['product_brand'];
            $pro_title=$row_cat_pro['product_title'];
            $pro_price=$row_cat_pro['product_price'];
            $pro_image=$row_cat_pro['product_image'];
            $pro_desc=$row_cat_pro['product_desc'];
            
            echo"

            <div class='col' id=$pro_id>
                <a class='text-decoration-none' href='detail.php?pro_id=$pro_id'>
                
                    <div class='card psition-relative shadow bg-light card-product pointer transition-05' style='height:26em; '>
                    
                        <div class='card-img p-2'>
                            <img src='admin-area/product_images/$pro_image' alt='product image' class='w-100 img-thumbnail' style='height:10em;'>
                        </div>
                    
                        <div class='card-body'>
                            <div class='mb-4' >
                                <h5 class='card-title h-6 lh-base w-100 text-secondary' style='height:3em;'>$pro_title
                                    <p class='badge text-secondary float-lg-end float-none pe-0 pt-2' id='price'> $$pro_price</p>
                                </h5>
                            </div>
                            <div class='product-desc-parent'>
                                <p class='product-desc text-justify text-dark'>$pro_desc</p>...
                            </div>
                        </div>
                        
                    </div>
                    
                </a>
            </div>
        ";
        }
    }
}

function getpro(){
    if(!isset($_GET['cat'])){
        if(!isset($_GET['brand'])){
    global $conn;
    $get_pro="SELECT * FROM products order by RAND() limit 0,8";
    $run_pro=mysqli_query($conn,$get_pro);
    while($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id=$row_pro['product_id'];
        $pro_cat=$row_pro['product_cat'];
        $pro_brand=$row_pro['product_brand'];
        $pro_title=$row_pro['product_title'];
        $pro_price=$row_pro['product_price'];
        $pro_image=$row_pro['product_image'];
        $pro_desc=$row_pro['product_desc'];
        
        echo"

            <div class='col' id=$pro_id>
                <a class='text-decoration-none' href='detail.php?pro_id=$pro_id'>
                
                    <div class='card psition-relative shadow bg-light card-product pointer transition-05' style='height:26em; '>
                    
                        <div class='card-img p-2'>
                            <img src='admin-area/product_images/$pro_image' alt='product image' class='w-100 img-thumbnail' style='height:10em;'>
                        </div>
                    
                        <div class='card-body'>
                            <div class='mb-4' >
                                <h5 class='card-title h-6 lh-base w-100 text-secondary' style='height:3em;'>$pro_title
                                    <p class='badge text-secondary float-lg-end float-none pe-0 pt-2' id='price'> $$pro_price</p>
                                </h5>
                            </div>
                            <div class='product-desc-parent'>
                                <p class='product-desc text-justify text-dark'>$pro_desc</p>...
                            </div>
                        </div>
                        
                    </div>
                    
                </a>
            </div>
        ";
    }
        }
 }
 
}

function getbrandpro(){

    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];

    global $conn;
    $get_brand_pro="SELECT * FROM products where  product_brand=$brand_id";
    $run_brand_pro=mysqli_query($conn,$get_brand_pro);
    $count_brands=mysqli_num_rows($run_brand_pro);
    if($count_brands==0){
        echo "<h2 style='padding: 20px;'>There is no product in this brand!<h2>";
        // exit();
    }
    while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
        $pro_id=$row_brand_pro['product_id'];
        $pro_cat=$row_brand_pro['product_cat'];
        $pro_brand=$row_brand_pro['product_brand'];
        $pro_title=$row_brand_pro['product_title'];
        $pro_price=$row_brand_pro['product_price'];
        $pro_image=$row_brand_pro['product_image'];
        $pro_desc=$row_brand_pro['product_desc'];

        
        echo"

        <div class='col' id=$pro_id>
            <a class='text-decoration-none' href='detail.php?pro_id=$pro_id'>
            
                <div class='card psition-relative shadow bg-light card-product pointer transition-05' style='height:26em; '>
                
                    <div class='card-img p-2'>
                        <img src='admin-area/product_images/$pro_image' alt='product image' class='w-100 img-thumbnail' style='height:10em;'>
                    </div>
                
                    <div class='card-body'>
                        <div class='mb-4' >
                            <h5 class='card-title h-6 lh-base w-100 text-secondary' style='height:3em;'>$pro_title
                                <p class='badge text-secondary float-lg-end float-none pe-0 pt-2' id='price'> $$pro_price</p>
                            </h5>
                        </div>
                        <div class='product-desc-parent'>
                            <p class='product-desc text-justify text-dark'>$pro_desc</p>...
                        </div>
                    </div>
                    
                </div>
                
            </a>
        </div>
    "; 
        }
        }

}

?>