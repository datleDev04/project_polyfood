<?php
function loadone_product($product_id)
{
    $sql = "select * from products where product_id=" . $product_id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadall_product($category_id)
{
    $sql = "select * from products where 1";
    if ($category_id > 0) {
        $sql .= " and category_id='" . $category_id . "'";
    }

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_product_category($category_id)
{
    $sql = "select * from products where category_id=" . $category_id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function product_cungloai($product_id, $category_id)
{
    $sql = "select * from products where product_id=" . $product_id . " AND category_id <>" . $category_id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function products_select_keyword($keyword){
    $sql = "SELECT * FROM products pro "
            . " JOIN categories cate ON cate.category_id=pro.category_id "
            . " WHERE product_name LIKE '%$keyword%' OR product_name LIKE '%$keyword%'";
    return pdo_query($sql);
}
function products_select_by_categories($category_id){
    $sql = "SELECT * FROM products WHERE category_id=$category_id";
    return pdo_query($sql);
}
function load_product_cungloai($product_id, $category_id)
{
    $sql = "select * from products where category_id=" . $category_id . " AND product_id <>" . $product_id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}