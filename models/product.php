<?php
    function loadProduct_byID($product_id){
        $sql = "select * from products where product_id=".$product_id;
        $product = pdo_query_one($sql);
        return $product;

    }
?>