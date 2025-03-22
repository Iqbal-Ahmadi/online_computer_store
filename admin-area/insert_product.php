<?php 
require_once("include/db.php");
 ?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/bootstrap-5.2.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../styles/style.css">

        <title>Inserting product</title>
    </head>

    <body class="bg-light">
        <section class="container my-4">
            <h1 class="display-6 pb-4">Product insertion detaial</h1>
            <div class="row justify-content-between gap-sm-5">

                <div class="col-lg-7 p-4 border border-2">
                    <form action="insert_product.php" method="POST" enctype="multipart/form-data">
                        <div class="col-12 col-lg-8 mb-4">
                            <input type="text" name="product_title" id="product_name" size="40" required
                                class="form-control py-3" placeholder="Product Name">
                        </div>
                        <div class="col-12 col-lg-8 mb-4">
                            <select name="product_cat" id="" required class="form-select">
                                <option value="">Select Categories</option>
                                <?php
                                     $get_cats="SELECT * FROM categories";
                                    $run_cats=mysqli_query($conn,$get_cats);
                                    while($row_cats=mysqli_fetch_array($run_cats)){
                                    
                                        $cat_id=$row_cats['cat_id'];
                                        $cat_title=$row_cats['cat_title'];
                                        echo "<option value='$cat_id'>$cat_title</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-8 mb-4">
                            <select name="product_brand" id="" class="form-select">
                                <option value="">Select brands</option>
                                <?php
                                    $get_brands="SELECT * FROM brands";
                                    $run_brands=mysqli_query($conn,$get_brands);
                                    while($row_brands=mysqli_fetch_array($run_brands)){
                                
                                        $brand_id=$row_brands['brand_id'];
                                        $brand_title=$row_brands['brand_title'];
                                        echo "<option value='$brand_id'>$brand_title</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-8 mb-4">
                            <input type="file" name="product_image" id="" required class="form-control">
                        </div>
                        <div class="col-12 col-lg-8 mb-4">
                            <input type="text" name="product_price" id="" placeholder="Set The Price" required
                                class="form-control  py-3">
                        </div>
                        <div class="col-12 col-lg-8 mb-4">
                            <textarea name="product_desc" id="" cols="40" rows="10"
                                placeholder="Some Info About Product ..." class="form-control  py-3"
                                style="resize:none;"></textarea>

                        </div>
                        <div class="col-12 col-lg-8 mb-4">
                            <input type="text" name="product_keywords" id="" size="40" placeholder="Product Keyword"
                                required class="form-control py-3">
                        </div>


                        <div class="col-12 col-lg-8">
                            <button type="submit" name="insert_post" class="btn btn-warning" class="w-100">Insert
                                Product</button>
                        </div>

                    </form>
                </div>

                <div class="col-lg-4  p-4 border border-2">
                    <div class="col-12 d-flex gap-1 border-bottom pb-2">
                        <img src="../images/canon_cam.jpeg" alt="product_name"
                            class="recent-added-product border rounded-2 p-2">
                        <p class="description overflow-hidden fs-6">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit.
                            Lorem ipsum dolor sit amet consectetur adipisicing
                        </p>
                    </div>
                    <div class="col-12 d-flex gap-1 border-bottom pb-2 mt-4">
                        <img src="../images/canon_cam.jpeg" alt="product_name"
                            class="recent-added-product border rounded-2 p-2">
                        <p class="description overflow-hidden fs-6">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit.
                            Lorem ipsum dolor sit amet consectetur adipisicing
                        </p>
                    </div>
                </div>

            </div>


        </section>


    </body>

</html>
<?php
if(isset($_POST['insert_post'])){

    //getting the text from the feild
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];

    //getting the imagie from the feild
    $product_image=$_FILES['product_image']['name'];
    $product_image_tmp=$_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp,"product_images/$product_image");

    $insert_product="insert into products(`product_cat`,`product_brand`,`product_title`,`product_price`,`product_desc`,`product_image`,`product_keywords`)
     value ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

     $insert_pro=mysqli_query($conn,$insert_product);
     if($insert_pro){
        echo "<script>alert('product has been inserted!')</script>";
        echo "<script>window.open('insert_product.php','_self')</script>";
     }
}


?>