<?php
function loadone_product($product_id)
{
    $sql = "select * from products where product_id=" . $product_id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function delete_product($product_id)
{
    $sql = "delete from products where product_id=". $product_id;
    pdo_execute($sql);
}  

function products_select_by_id($product_id){
    $sql = "SELECT * FROM products WHERE product_id=$product_id";
    return pdo_query_one($sql);
}
function loadallproduct(){
    $sql = "select * from products";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_product($category_id)
{
    $sql = "select * from products where 1";
    if ($category_id > 0) {
        $sql .= " and category_id='" . $category_id . "'";
    }else{
        $sql .="";
    }

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function products_select_all(){
    $sql = "SELECT p.*,c.category_name FROM products p join categories c on p.category_id=c.category_id";
    return pdo_query($sql);
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
function products_update($product_id,$product_name, $price, $discount, $image, $category_id,  $quantity, $detail){
    $sql = "UPDATE products SET product_name ='$product_name', price=$price, discount=$discount, image='$image', category_id=$category_id, quantity=$quantity, detail='$detail' WHERE product_id = ".$product_id;
    pdo_execute($sql);
}
function products_insert($product_name, $price, $discount, $image, $category_id, $quantity, $detail){
    $sql = "INSERT INTO products(product_name, price, discount, image, category_id,  quantity, detail) 
    VALUES ( '$product_name', $price, $discount, '$image', $category_id , $quantity, '$detail')";
    pdo_execute($sql);
}