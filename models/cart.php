<?php
function update_product_cart($quantity, $total, $id){
    foreach ($_SESSION['my_cart'] as $key => $cart) { 
        if ($cart['product_id'] == $id) {
            $_SESSION['my_cart'][$key]['quantity'] = $quantity;
            $_SESSION['my_cart'][$key]['total_price'] = $total;
        }
    }
}


?>