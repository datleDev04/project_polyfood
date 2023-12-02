
<?php function categories_delete($category_id)
{
    if (is_array($category_id)) {
        foreach ($category_id as $id_tmp) {
            $sql = "DELETE FROM categories WHERE category_id=$id_tmp";
            pdo_execute($sql);
        }
    } else {
        $sql = "DELETE FROM categories WHERE category_id=$category_id";
        pdo_execute($sql);
    }
}
function comment_delete($comment_id)
{
    if (is_array($comment_id)) {
        foreach ($comment_id as $ma) {
            $sql = "DELETE FROM comments  WHERE comment_id=$ma";

            pdo_execute($sql);
        }
    } else {
        $sql = "DELETE FROM comments  WHERE comment_id=$comment_id";

        pdo_execute($sql);
    }
}
{
    if (is_array($order_id)) {
        foreach ($order_id as $ma) {
            $sql = "DELETE FROM orders WHERE order_id=$ma";

            pdo_execute($sql);
        }
    } else {
        $sql = "DELETE FROM orders WHERE order_id=$order_id";

        pdo_execute($sql);
    }
}
function post_delete($post_id)
{

    if (is_array($post_id)) {
        foreach ($post_id as $ma) {
            $sql = "DELETE FROM post_image WHERE post_id=$ma";
            pdo_execute($sql);
            $sql = "DELETE FROM comments WHERE post_id=$ma";
            pdo_execute($sql);
            $sql = "DELETE FROM posts WHERE post_id=$ma";
            pdo_execute($sql);
        }
    } else {
        $sql = "DELETE FROM comments WHERE post_id=$post_id";
        pdo_execute($sql);
        $sql = "DELETE FROM post_image WHERE post_id=$post_id";
        pdo_execute($sql);
        $sql = "DELETE FROM posts WHERE post_id=$post_id";
        pdo_execute($sql);
    }
}
function products_delete($product_id){
    if(is_array($product_id)){
        
        foreach ($product_id as $id_tmp) {
            
    $sql = "DELETE FROM products WHERE  product_id=$id_tmp";
    // var_dump($sql);
    //     die;
    pdo_execute($sql);
        }
    }
    else{
    $sql = "DELETE FROM products WHERE  product_id=$product_id";
        pdo_execute($sql);
    }
}
function delete_users($user_id)
{
    if (is_array($user_id)) {
        foreach ($user_id as $ma) {
            $sql = "DELETE FROM users WHERE user_id=$ma";

            pdo_execute($sql);
        }
    } else {
        $sql = "DELETE FROM users  WHERE user_id=$user_id";

        pdo_execute($sql);
    }
}
?>