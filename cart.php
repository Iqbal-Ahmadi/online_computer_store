<?php
require_once("functions/function.php");

?>
<section class="col-4 position-fixed end-0 top-0 bottom-0 bg-white shadow transition-1" id="cart-modal">
    <h5 class="d-flex align-items-center justify-content-between mx-4 py-3">
        <span class="col-9">Shopping Cart</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 col-1 text-end p-1 pointer" id="x-mark">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" data-mark="x-mark" />
        </svg>
    </h5>
    <div class="p-4" id="cart-modal-body">
        <?php
        $total = 0;
        global $conn;
        $ip = getRealIpAddr();
        $sel_price = "select * from cart";
        $run_price = mysqli_query($conn, $sel_price);
        while ($p_price = mysqli_fetch_array($run_price)) {
            $pro_id = $p_price['p_id'];
            $pro_quantity = $p_price['qty'];
            $pro_price = "select * from products where product_id='$pro_id'";
            $run_pro_price = mysqli_query($conn, $pro_price);
            while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                $product_price = array($pp_price['product_price'] * $pro_quantity);
                $product_title = $pp_price['product_title'];
                // $product_image=$pp_price['product_image'];
                $single_price = $pp_price['product_price'];
                $values = array_sum($product_price);
                $total += $values;

                echo  "<div class='border-bottom border-primary py-3' id=$pro_id>
                                <h5 class='mb-0 fs-5'>$product_title</h5>
                                <p class='badge ps-0 mb-2 text-secondary'>$$single_price</p>
                      
                                <div class='d-flex align-items-center justify-content-start'>
                                  <div class='col-11'>
                                    <p class='mb-0 '>Amount: $pro_quantity</p>
                                  </div>
                                    <form action='#' method='POST'>
                                        <input type='hidden' name='remove[]' value='$pro_id'>
                                        <button type='submit' name='del' class='btn col-1 text-end p-0'>
                                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='dodgerblue' class='w-6 h-6' style='height:1.3em; width:1.3em;'>
                                            <path stroke-linecap='round' stroke-linejoin='round' d='M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0' />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                              </div>";
            }
        }
        if (isset($_POST['del'])) {
            //echo print_r($_POST)
            foreach ($_POST['remove'] as $remove_id) {
                if (isset($remove_id)) {

                    $delete_product = "DELETE from cart where p_id=$remove_id";

                    $run_delete = mysqli_query($conn, $delete_product);
                    if ($run_delete) {
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                }
            }
        }

        ?>
    </div>
    <div class="px-4 pb-4" id="cart-modal-footer">
        <h6 class=" border-top border-bottom d-flex justify-content-between py-3 total-price">
            <span class="float-start">Total:</span>
            <span class="float-end text-primary"><?php echo '$' . $total ?></span>
        </h6>
        <div class="row mx-1 gap-1 pt-2">
            <a href="payment.php" class="btn btn-blue col rounded-5 p-2"> Check Out</a>
            <a href="index.php" class="btn btn-blue col rounded-5 p-2"> Continue Shopping</a>
        </div>
    </div>
</section>
<button class="add- btn cart-btn position-fixed transition-05">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" data-cart="cart-btn" stroke="currentColor" class="w-6 h-6 text-warning" style="width: 3.5em; height: 3.5em;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" data-cart="cart-btn" />
    </svg>
    <span class="d-block"><?php echo '$' . $total; ?></span>
</button>