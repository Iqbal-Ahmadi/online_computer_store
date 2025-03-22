<?php
require_once ("functions/function.php");
session_start();
?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>online shoping</title>
        <link rel="stylesheet" href="styles/bootstrap-5.2.3-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="styles/style.css" />
    </head>

    <body>
        <!-- navbar -->
        <?php include_once('navbar.php');?>
        <!-- end navbar -->
        <main>
            <?php 
            if(!isset($_SESSION['customer_email'])){
                // header('location:index.php');
                echo"<script>alert('please login first')</script>";
                echo"<script>window.open('index.php','_self')</script>"; 



            }
            else{
                echo
                "<h2 align='center'>pay now with paypal</h2>
                <p style='text-align:center;'><img src='admin-area/paypal_img.png' width='500' height='500' alt=''></p>";
            }
            ?>
            <!-- <h2 align='center'>pay now with paypal</h2>
                <p style='text-align:center;'><img src='admin-area/paypal_img.png' width='500' height='500' alt=''></p> -->
        </main>

        <?php include_once('footer.php')?>

        <script src="styles/bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
        <script src="js/detail.js"></script>
    </body>

</html>