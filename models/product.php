<?php
    function loadProduct_byID($product_id){
        $sql = "select * from products where product_id=".$product_id;
        $product = pdo_query_one($sql);
        return $product;

    }

        
    function products_update($product_id,$product_name, $price, $discount, $image, $category_id,  $quantity, $detail){
        $sql = "UPDATE products SET product_name='$product_name', price=$price, discount=$discount, image='$image', category_id=$category_id, quantity=$quantity, detail='$detail' WHERE product_id=$product_id";
        pdo_execute($sql);
    }
        
    function products_delete($product_id){
        // if(is_array($product_id)){
            
        //     foreach ($product_id as $id_tmp) {
                
        // $sql = "DELETE FROM products WHERE  product_id=$id_tmp";
        // // var_dump($sql);
        // //     die;
        // pdo_execute($sql);
        //     }
        // }
        // else{
        $sql = "UPDATE products SET product_status= 1 WHERE  product_id=$product_id";
            pdo_execute($sql);
        //}
    }

    function recover_product($product_id){
        $sql = "UPDATE products SET product_status= 0 WHERE  product_id=$product_id";
            pdo_execute($sql);
    }
        
    function products_select_all(){
        $sql = "SELECT p.*,c.category_name FROM products p join categories c on p.category_id=c.category_id WHERE p.product_status=0";
        return pdo_query($sql);
    }
    function products_disable_select_all(){
        $sql = "SELECT p.*,c.category_name FROM products p join categories c on p.category_id=c.category_id WHERE p.product_status=1";
        return pdo_query($sql);
    }
        
    function products_select_by_id($product_id){
        $sql = "SELECT * FROM products WHERE product_id=$product_id";
        return pdo_query_one($sql);
    }
        
    function products_exist($product_id){
        $sql = "SELECT count(*) FROM products WHERE product_id=$product_id";
        return pdo_query_value($sql) > 0;
    }
    
    function products_name_exist($product_name)
    {
        $sql = "SELECT count(*) FROM products WHERE product_name='$product_name'";
        return pdo_query_value($sql) > 0;
    }
    
    function products_name_exist_id($product_name, $product_id)
    {
        $sql = "SELECT count(*) FROM products WHERE product_name='$product_name' AND product_id != $product_id";
        return pdo_query_value($sql) > 0;
    }
        
    function products_view_up($product_id){
        $sql = "UPDATE products SET view = view + 1 WHERE product_id=$product_id";
        pdo_execute($sql);
    }
        
    function products_select_top10(){
        $sql = "SELECT * FROM products WHERE view > 0 ORDER BY view DESC LIMIT 0, 10";
        return pdo_query($sql);
    }
       
        
    function products_select_by_categories($category_id){
        $sql = "SELECT * FROM products WHERE category_id=$category_id";
        return pdo_query($sql);
    }
       
    function products_select_keyword($keyword,$typeFilter){
        $sql = "SELECT * FROM products pro "
                . " JOIN categories cate ON cate.category_id=pro.category_id "
                . " WHERE product_name LIKE '%$keyword%' OR product_name LIKE '%$keyword%'";


                if ($typeFilter == "low") {
                    $sql.= " ORDER BY price ASC";
                 }
                 if ($typeFilter == "high") {
                    $sql.= " ORDER BY price DESC";
                 }
                 if ($typeFilter == "popular") {
                    $sql.= " ORDER BY price DESC";
                 }
                 if ($typeFilter == "least") {
                    $sql.= " ORDER BY price ASC";
                 }
        return pdo_query($sql);
    }

    function loadone_product($product_id)
{
    $sql = "select * from products where product_id=" . $product_id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadall_product($category_id,$typeFilter)
{
    $sql = "select * from products where products.product_status=0";
    if ($category_id > 0) {
        $sql .= " and category_id='" . $category_id . "'";
        
    }else if ($typeFilter == "low" && $category_id == "") {
        $sql.= " ORDER BY price ASC";
     }else if ($typeFilter == "high"  && $category_id == "") {
        $sql.= " ORDER BY price DESC";
     }else if ($typeFilter == "popular"  && $category_id == "") {
        $sql.= " ORDER BY view DESC";
     }else if ($typeFilter == "least"  && $category_id == "") {
        $sql.= " ORDER BY view ASC";
     }elseif ($category_id > 0 &&  isset($typeFilter)) {
        $sql .= " and category_id='" . $category_id . "'";
            if ($typeFilter == "low") {
                $sql.= " ORDER BY price ASC";
             }
             if ($typeFilter == "high") {
                $sql.= " ORDER BY price DESC";
             }
             if ($typeFilter == "popular") {
                $sql.= " ORDER BY price DESC";
             }
             if ($typeFilter == "least") {
                $sql.= " ORDER BY price ASC";
             }
        
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
// function products_select_keyword($keyword){
//     $sql = "SELECT * FROM products pro "
//             . " JOIN categories cate ON cate.category_id=pro.category_id "
//             . " WHERE product_name LIKE '%$keyword%' OR product_name LIKE '%$keyword%'";
//     return pdo_query($sql);
// }
// function products_select_by_categories($category_id){
//     $sql = "SELECT * FROM products WHERE category_id=$category_id";
//     return pdo_query($sql);
// }
function load_product_cungloai($product_id, $category_id)
{
    $sql = "select * from products where category_id=" . $category_id . " AND product_id <>" . $product_id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


function loadallproduct(){
    $sql = "select * from products";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


function products_insert($product_name, $price, $discount, $image, $category_id, $quantity, $detail){
    $sql = "INSERT INTO products(product_name, price, discount, image, category_id,  quantity, detail) 
                      VALUES ( '$product_name', $price, $discount, '$image', $category_id , $quantity, '$detail')";
    pdo_execute($sql);
}

function update_quantity($product_id,$quantity){
    $sql = "UPDATE products set quantity =$quantity where product_id = $product_id ";
    pdo_execute($sql);
}
//  

function statistic_products(){
    $sql = "SELECT cate.category_id, cate.category_name,"
    . " COUNT(*) total,"
    . " MIN(pro.price) price_min,"
    . " MAX(pro.price) price_max,"
    . " AVG(pro.price) price_avg"
    . " FROM products pro "
    . " JOIN categories cate ON cate.category_id=pro.category_id "
    . " GROUP BY cate.category_id, cate.category_name";
return pdo_query($sql);
}
?>