<?php
require_once ("functions/function.php");

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>online shoping</title>
        <link rel="stylesheet" href="styles/bootstrap-5.2.3-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="styles/style.css">

    </head>

    <body>

        <!-- navbar -->
        <?php include_once('navbar.php');?>
        <!-- end navbar -->
        <main>
            <section class="container-fluid px-0 h-100 pt-5">
            <h2 class="d-flex justify-content-center align-items-center gap-2">
                    <span class="lines bg-warning"></span>
                    <span class="display-6">
                        <?php 
                            if(isset($_POST['user_query'])){
                            $search_query=$_POST['user_query'];
                            echo ucwords($search_query);
                            }
                            ?> 
                    </span>
                    <span class="lines bg-warning"></span>
                </h2>
            <div class="row container m-auto row-cols-2 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 g-2 g-lg-4 pt-5">
                    
                
                <?php
                if(isset($_POST['user_query'])){

                    $search_query=$_POST['user_query'];
                    $get_pro="SELECT * FROM products where product_title like '%$search_query%'";
                    $run_pro=mysqli_query($conn,$get_pro);
                    while($row_pro=mysqli_fetch_array($run_pro)){
                        $pro_id=$row_pro['product_id'];
                        $pro_title=$row_pro['product_title'];
                        $pro_price=$row_pro['product_price'];
                        $pro_image=$row_pro['product_image'];
                        $pro_desc=$row_pro['product_desc'];

                    echo "
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
                    ?>
                </div>
            </section>
            
            <!-- sign in modal -->
            <section
                class="col-10 col-lg-4 col-md-5 sign-in-modal position-fixed top-0 start-0 bottom-0 end-0 m-auto bg-light rounded-4 shadow"
                id="modal">
                <div class="p-1 p-lg-5 p-md-5 p-sm-5 fs-5 py-lg-4">

                    <h2 id="modal-title" class="col-5 m-auto text-center modal-title display-6  pb-2 mb-5">Sign in</h2>
                    <form action="" id="sign-in-form">
                        <div class="wrapper w-100">
                            <label for="sign-in-email" class="">Emaill Address</label>
                            <input type="email" name="email" class="form-input py-2 ps-1 rounded-3 fs-4"
                                id="sign-in-email" required>
                            <span class="underline"></span>

                        </div>
                        <div class="wrapper w-100">
                            <label for="sign-in-pass" class="">Password</label>
                            <input type="password" class="form-input py-2 ps-1 rounded-3 fs-4" id="sign-in-pass"
                                name="password" required>
                            <span class="underline"></span>

                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="remember-ness" class="form-check-input" id="remember">
                            <label for="remember" class="form-check-label">Keep me sign in</label>
                        </div>
                        <div class="mt-5 w-100">
                            <button type="submit" name="login" class="col-12 btn btn-blue fw-bold fs-4">Log
                                in</button>
                        </div>

                        <p class="mt-2">Not have an account? <span id="sign-up-link"
                                class="text-decoration-none link-primary pointer">Sign
                                up</span>
                        </p>

                        <!-- signup -->
                    </form>
                </div>
            </section>
            <section id="scape" class="scape position-fixed top-0 w-100 h-100 d-none"></section>
            <!-- srart cart section -->
            <?php include_once('cart.php')?>
            <!-- end cart section -->
        </main>

        <?php include_once('footer.php')?>
        
        <script src="styles/bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/detail.js"></script>

    </body>

</html>