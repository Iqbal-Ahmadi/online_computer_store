<?php
require_once ("functions/function.php")
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
        <header class="container-fluid bg-light py-2">
            <div class="d-flex align-items-center justify-content-evenly">

                <div class=" col-10 col-lg-1 col-md-2 fs-3">
                    <span class="bg-orange">Old</span><span class="text-dark">Gold</span>
                </div>

                <img src="images/nav/bars-solid.svg" alt="bar" class="col-2 solid-bar d-none ms-auto me-3 pointer"
                    id="bars" style="width: 1.3em; height: 1.3em;" />

                <nav class="nav-bar col-lg-11 col-md-10 row justify-content-between align-items-center">
                    <!-- style="margin-left:auto;" -->
                    <div class="col-12 col-lg-4 col-md-5">
                        <ul class="navbar-nav flex-row gap-lg-3 gap-md-4 justify-content-evenly">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link p-3">Home</a>
                            </li>

                            <!-- catagories link and sublink -->
                            <li class="nav-item d-flex align-items-center position-relative pointer">
                                <a class="dropdowns nav-link p-3 pe-0" id="catagories" data-link="catagories">
                                    Categories
                                </a>
                                <ul class="dropdowns-menu ps-0 order-3 rounded shadow list-unstyled position-absolute top-50 mt-4 d-none"
                                    id="catagories-sub-links" style="width:10em;">
                                    <?php    getcats(); ?>
                                </ul>
                            </li>

                            <!-- brands link and sublink -->
                            <li class="nav-item d-flex align-items-center position-relative pointer">
                                <a class="dropdowns nav-link p-3 pe-0" id="brands" data-link="brands">
                                    Brands
                                </a>
                                <ul class="dropdowns-menu ps-0 order-3 rounded shadow list-unstyled position-absolute top-50 mt-4 d-none"
                                    id="brands-sub-links" style="width:10em;">
                                    <?php    getbrands(); ?>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- right side -->
                    <div class="col-12 col-lg-6 col-md-6 d-flex justify-content-between align-items-center">
                        <div class="col-12 col-lg-8 col-md-9">
                            <form action="result.php" method="POST"
                                class="d-flex align-items-center position-relative nav-link" role="search">
                                <input class="form-control rounded-3 search-box" type="search" name="user_query"
                                    placeholder="search a product" size="25" id="search-box" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 position-absolute end-0 bg-warning text-light" id="magnifier">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </form>
                        </div>

                        <div class="col-12 col-lg-3 col-md-3 bg-light">
                            <button class="btn btn-blue w-100" id="sign-in-btn">
                                Sign in
                            </button>
                        </div>
                    </div>

                </nav>
            </div>
        </header>
        <!-- end navbar -->
        <main>
            <section class="container-fluid px-0 h-100  bg-light">
                <script>
                document.getElementById("search-box").addEventListener("keydown", (e) => {
                            if (e.key === "Enter") {
                </script>
                <?php

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
                        <div class='bg-warning shadow mb-5 py-3 text-light ps-4 pointer'>
                            <a href='index.php#$pro_id' class='text-decoration-none link-light'>Home </a>/
                            <span class=''>$pro_title</span>
                        </div>

                        <div id='single_product' class='container pt-5'>

                            <div class='row gy-5 gap-4'>
                                <div class='col-11 col-lg-6 m-auto border border-2 p-3 rounded-3'>
                                    <img src='admin-area/product_images/$pro_image' class='w-100'>
                                </div>
                                
                                <div class='col-11 col-lg-5 m-auto m-lg-3'>
                                    <div class='border-bottom border-primary pb-4'>
                                        <h5 class='text-dark'>$pro_title </h5>
                                        <span class='col-12'>Price : $pro_price$</span>
                                    </div>
                                    <p class='text-justify pt-4'>$pro_desc<p>
                                    <div class='d-flex align-items-center justify-content-between gap-1 mt-4'>
                                        <div class='input-group align-items-center border border-primary rounded-5' style='width:8em;'>
                                            <span class='col-3 decrease pointer transition-05 px-0 ' id='decrease' data-uuid='$pro_id' style='padding-block:.8em;'>
                                                <svg xmlns='http://www.w3.org/2000/svg' fill='black' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' width='1em' class='w-6 h-6 d-block m-auto'>
                                                <path stroke-linecap='round' stroke-linejoin='round' d='M19.5 12h-15' />
                                            </svg>
                                            </span>
                                            <input class='d-inline-block col-6 text-center border-0' type='number' step='1' value='1' id='amount' name='input'>
                                            <span class='col-3 increase pointer transition-05 px-0' id='increase' data-uuid='$pro_id'>
                                                <svg xmlns='http://www.w3.org/2000/svg' fill='black' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' width='1em' class='w-6 h-6 d-block m-auto'>
                                                    <path stroke-linecap='round' stroke-linejoin='round' d='M12 4.5v15m7.5-7.5h-15' />
                                                </svg>    
                                            </span>
                                        </div>
                                        <button type='button' class='btn btn-lg btn-blue btn-outline-dark border-0 ms-2 add-to-cart' data-info='$pro_id,$pro_title,$pro_price' >Add To Cart</button>
                                        <a href='#' class='btn btn-lg btn-blue btn-outline-dark border-0' >Buy Now</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    "; 
                }   
                    ?>
                <script>
                }
                });
                </script>

            </section>

            //
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


            <button class="btn cart-btn position-fixed transition-05">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    data-cart="cart-btn" stroke="currentColor" class="w-6 h-6 text-warning"
                    style="width: 3.5em; height: 3.5em;">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                        data-cart="cart-btn" />
                </svg>
                <span class="d-block">0 Af</span>
            </button>
            <section class="col-4 position-fixed end-0 top-0 bottom-0 bg-white shadow transition-1" id="cart-modal">
                <h5 class="d-flex align-items-center justify-content-between mx-4 py-3">
                    <span class="col-9">Shopping Cart</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 col-1 text-end p-1 pointer" id="x-mark">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"
                            data-mark="x-mark" />
                    </svg>
                </h5>
                <div class="p-4" id="cart-modal-body"></div>
                <div class="p-4" id="cart-modal-footer"></div>
            </section>




        </main>
        <footer id="footer" class="footer mt-5">
            <div class="footer-top">
                <div class="container">
                    <div class="row gy-4">
                        <div class="col-lg-5 col-md-12 footer-info">
                            <a href="index.php" class="text-decoration-none fs-3">
                                <span class="bg-orange">Old</span><span class="text-dark">Gold</span>
                            </a>
                            <p class="w-75">
                                For community empowerment, economic self-reliance and reduction
                                of social vulnerabilities
                            </p>
                            <div class="mt-5">
                                <h4>Follow us</h4>
                                <div class=" d-flex gap-3">
                                    <a href="#" class="">
                                        <i class="fa-brands fa-square-twitter fa-2xl fa-beat-fade"
                                            style="color: #2267dd;"></i>
                                    </a>
                                    <a href="#" class="">
                                        <i class="fa-brands fa-square-facebook fa-beat-fade fa-2xl "
                                            style="color: #1864e7;"></i>
                                    </a>
                                    <a href="#" class="">
                                        <i class="fa-brands fa-instagram fa-beat-fade fa-2xl"
                                            style="color: #fd496d;"></i></a>
                                    <a href="#" class="">
                                        <i class="fa-brands fa-linkedin fa-beat-fade fa-2xl"
                                            style="color: #2268e2;"></i>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li>
                                    <a class="text-decoration-none fs-6" href="index.php">Home</a>
                                </li>
                                <li>
                                    <a class="text-decoration-none fs-6" href="about us.html">About us</a>
                                </li>
                                <li class="accordion">
                                    <div class="w-75" id="dropdowned-links">

                                        <div class="accordion-item mb-3 w-75">
                                            <button type="button" class="accordion-button bg-light"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne" id="categories">
                                                Categories
                                            </button>
                                            <div id="collapseOne" class="accordion-collapse collapse "
                                                aria-labelledby="categories" data-bs-parent="#dropdowned-links">
                                                <div class="accordion-body">
                                                    <ul class=" ps-0 rounded p-3">
                                                        <?php    getcats(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item w-75">
                                            <button type="button" class="accordion-button bg-light"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                                                Brands </button>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo" data-bs-parent="#dropdowned-links">
                                                <div class="accordion-body">
                                                    <ul class="ps-0  rounded p-3">
                                                        <?php    getbrands(); ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-contact text-md-start">
                            <h4>Contact Us</h4>
                            <p>
                                Shop No. 15, Golbahar center <br />
                                shar-e-now<br />
                                Kabul Afghanistan <br /><br />
                                <strong>Phone:</strong> +93 200 399 222<br />
                                <strong>Email:</strong> oldgold.ecommerce.com<br />
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright py-2">
                    &copy; Copyright <strong class="bg-orange">Old<span class="text-dark">Gold</span></strong>
                    . All Rights Reserved
                </div>
            </div>
        </footer>



        <script src="styles/bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/detail.js"></script>




    </body>

</html>