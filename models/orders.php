<?php

function insert_order($product_id, $quantity, $user_id, $note, $status)
{
    $sql = "INSERT INTO orders(product_id,quantity,user_id,note,status) 
                      VALUES ( $product_id, $quantity, '$user_id', '$note', $status)";
    pdo_execute($sql);
}
function update_order($product_id, $quantity, $user_id, $note, $status, $order_id)
{
    $sql = "UPDATE orders SET product_id=$product_id, quantity=$quantity, user_id='$user_id', note='$note', status=$status WHERE order_id=$order_id";
    pdo_execute($sql);
}
function order_delete($order_id)
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
function order_select_all()
{
    $sql = "SELECT * FROM orders";
    return pdo_query($sql);
}
function order_select_by_id($order_id)
{
    $sql = "SELECT * FROM orders WHERE order_id=$order_id";
    return pdo_query_one($sql);
}
function order_exist($order_id)
{
    $sql = "SELECT count(*) FROM orders WHERE order_id=$order_id";
    return pdo_query_value($sql) > 0;
}
function order_select_by_user_id($user_id)
{
    $sql = "SELECT * FROM orders WHERE user_id=$user_id";
    return pdo_query($sql);
}
//lấy ra đơn hàng cuối cùng
function orders_select_last_id()
{
    $sql = "SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1";
    return pdo_query_value($sql);
}

// chuyển trạng thái đơn hàng với input status hủy đơn hàng hay đã nhận hàng
function confirm_orderStatus($order_id,$status){
    $sql = "UPDATE orders SET status=$status WHERE order_id=$order_id";
    pdo_execute($sql);
}

function order_change_status($order_id)
{
    $sql = "UPDATE orders SET status=1 WHERE order_id=$order_id";
    pdo_execute($sql);
}
// order đã được xử lý
function order_select_by_finish()
{
    $sql = "SELECT * FROM orders WHERE status=1";
    return pdo_query($sql);
}

// order chưa được xử lý

function order_select_by_unfinished()
{
    $sql = "SELECT o.*,u.name,u.user_id,p.product_name,p.image,p.price,p.discount FROM orders o JOIN users u ON o.user_id = u.user_id JOIN products p ON o.product_id = p.product_id WHERE o.status=0 order by o.order_id DESC";
    return pdo_query($sql);
}
function info_order($user_id)
{
    $sql = "SELECT o.*,u.name,u.user_id,u.user_name,p.product_name,p.image,p.price,p.discount FROM orders o JOIN users u ON o.user_id = u.user_id JOIN products p ON o.product_id = p.product_id WHERE o.user_id=$user_id order by o.order_id DESC ";
    return pdo_query($sql);
}



function join_order_product($user_id)
{
    $sql = "SELECT o.*,p.product_id as product_id, p.product_name as product_name, p.price as price, p.image as image, p.category_id as category_id FROM orders o JOIN products p ON o.product_id=p.product_id JOIN users u ON o.user_id=u.user_id WHERE o.user_id=$user_id order by o.order_id desc";
    return pdo_query($sql);
}
function count_order_by_user($user_id)
{
    $sql = "SELECT count(*) FROM orders WHERE user_id=$user_id";
    return pdo_query_value($sql);
}


function statistic_orders(){
    $sql = "SELECT u.user_id, u.user_name,u.name,"
    . " COUNT(*) total,"
    . " MIN(o.time_order) old,"
    . " MAX(o.time_order) new"
    . " FROM orders o "
    . " JOIN users u ON u.user_id=o.user_id "
    . " GROUP BY u.user_id, u.user_name, u.name"
    . " HAVING total > 0";
    return pdo_query($sql);
}