<?php

include("functions/function.php");
include("includes/db.php");
session_start();

// function setvalue($fieldName){
//     if(isset($_POST[$fieldName])){
//         echo $_POST[$fieldName];
//     }
// }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styles/signup-style.css">

</head>
<body>
    
    <div class="sign">
    <h1>Sign Up</h1>
    <hr>
    <form action="signup_form.php" method="POST" enctype="multipart/form-data">
        <label for="c_name" >First Name</label>
        <input type="text" name="c_name" required>

        <label for="c_email">Email</label>
        <input type="email"name="c_email" required>

        <label for="c_pass">Password</label>
        <input type="password" name="c_pass" required>

        <!-- <label for="password2">Confirm Password</label>
        <input type="password" name="password2" id="" required> -->

        <label for="c_country">Country</label>
        <select name="c_country" id="">
            <option value="">Select a Country</option>
            <option value="">Afghanistan</option>
            <option value="">India</option>
            <option value="">Japan</option>
            <option value="">Pakistan</option>
            <option value="">United states</option>
            <option value="">Russia</option>
            <option value="">Tajikistan</option>
            <option value="">united kingdom</option>
            <option value="">Iran</option>
            <option value="">Nepal</option>

        </select>

        <label for="c_city">City</label>
        <input type="text" name="c_city" id=""  required>

        <label for="c_contact">Contact</label>
        <input type="text" name="c_contact" required>
        
        <label for="c_address">Address</label>
        <!-- <input type="text" name="c_address" id="" required> -->
        <textarea name="c_address" id="" cols="35" rows="7"></textarea>

        <label for="c_image">Image</label>
        <input type="file" name="c_image" required>

        <input type="submit" name="register" value="Creat Account">
    </form>
    
    <p>By clicking the Sign up button.you agree to out <br><a href="">Term and Condition</a> and <a href="">Policy Privacy.</a></p>
    </div>
    <p class="para-2">Already have an account? <a href="login_form.php">Login Here</a></p>

</body>
</html>
<?php
    if(isset($_POST['register'])){
        $ip=getRealIpAddr();

        $c_name=$_POST['c_name'];
        $c_email=$_POST['c_email'];
        $c_pass=$_POST['c_pass'];
        $c_country=$_POST['c_country'];
        $c_city=$_POST['c_city'];
        $c_contact=$_POST['c_contact'];
        $c_address=$_POST['c_address'];
        $c_image=$_FILES['c_image']['name'];
        $c_image_tmp=$_FILES['c_image']['tmp_name'];

        move_uploaded_file($c_image_tmp,"customer/customer_image/$c_image");
        $insert_c =mysqli_query($conn,"INSERT into customers (customer_ip,customer_name,customer_email,customer_password,customer_country,customer_city,customer_contact,customer_address,customer_image)
         VALUES('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')");

        $cart_sel="SELECT * FROM cart WHERE ip_add=$ip";
        $run_cart=mysqli_query($conn,$cart_sel);
        $check_cart=mysqli_num_rows($run_cart);
        if($check_cart==0){
            $_SESSION['customer_email']=$c_email;
            echo"<script>alert('Account has been created successfully')</script>";
            // echo"<script>window.open('customer/myaccount.php','_self')</script>";
            header("location:customer/myaccount.php");
        }
        else {
            $_SESSION['customer_email']=$c_email;
            echo"<script>alert('Account has been created successfully')</script>";
            // echo"<script>window.open('customer/checkout.php','_self')</script>"; 
            header("location:checkout.php");   
        }
    }

?>