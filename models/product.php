<?php
function loadone_product($product_id)
{
    $sql = "select * from products where product_id=" . $product_id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadall_product($category_id)
{
    $sql = "select * from products ";
    if ($category_id > 0) {
        $sql .= " and category_id='" . $category_id . "'";
    }
    $sql = "select * from products ";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_product_category($category_id)
{
    $sql = "select * from products where category_id=" . $category_id;
    $sp = pdo_query_one($sql);
    return $sp;
}
