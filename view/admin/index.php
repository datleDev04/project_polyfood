<?php
session_start();
require_once "menu.php";
require_once "header.php";
require_once "../../tongquan.php";
require_once "../../global.php";
require_once "../../models/pdo.php";
require_once "../../models/categories.php";
require_once "../../models/product.php";
require_once "../../models/feedback.php";
// require_once "../../global.php";
// require_once "../../models/feedbacks.php";
// require_once "../../public/public.php";
$url = isset($_GET['url']) ? $_GET['url'] : 'trang_chu';
extract($_REQUEST);
if (isset($url) && $url != "") {
    switch ($url) {
        case 'product':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = $_GET['product_id'];
            } else {
                $product_id = 0;
            }
            $item = products_select_by_id($product_id);
            $items = products_select_all();
            require_once "../admin/products/list.php";
            break;
        case 'xoa_product':
            if (isset($_GET['product_id'])) {
                $product_id = $_GET['product_id'];
                delete_product($product_id);
            }
            $listall_product = loadallproduct();
            require_once "../admin/products/list.php";
            break;


        case 'update':
            if (isset($_POST['update'])) {
                $product_id = $_POST['product_id'];
                $product_name = $_POST['product_name'];
                $category_id = $_POST['category_id'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $quantity = $_POST['quantity'];
                $discount = $_POST['discount'];
                $detail = $_POST['detail'];
                $upload_image = $_FILES['upload_image']['name'];
                $target_dir = "../../src/assets/images/products/";
                $upload_image = save_file("upload_image", "$target_dir");
                $image = strlen("$upload_image") > 0 ? $upload_image : $image;
                try {
                    products_update($product_id, $product_name, $price, $discount, $image, $category_id,  $quantity, $detail);
                    $MESSAGE = "Cập nhật thành công!";
                } catch (Exception $exc) {
                    $MESSAGE = "Cập nhật thất bại!";
                }
            }
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = $_GET['product_id'];
            }
            $item = products_select_by_id($product_id);
            $productall = loadallproduct();
            $cate = loadone_category($product_id);
            $cates = loadall_category();
            require_once "../admin/products/update.php";
            break;
        case 'add_product':
            $product_name = "";
            if (isset($_POST['btn_insert'])) {
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $quantity = $_POST['quantity'];
                $detail = $_POST['detail'];
                $target_dir = "../../src/assets/images/products/";
                $upload_image = save_file("image", "$target_dir");
                $image = strlen("$upload_image") > 0 ? $upload_image : $image;
                try {
                    products_insert($product_name, $price, $discount, $image, $category_id, $quantity, $detail);
                    unset($product_name, $price, $discount, $image, $category_id, $quantity, $detail);
                    $MESSAGE = "Thêm mới thành công!";
                } catch (Exception $exc) {
                    $MESSAGE = "Thêm mới thất bại!";
                }
            }
            $productall = loadallproduct();
            $cates = loadall_category();
            $listall_category = loadall_category();
            require_once "../admin/products/add.php";
            break;
        case 'feedback':
            extract($_REQUEST);
            $items = statistic_feedbacks();
            // $items=feedbacks_select_all();
            require_once "../admin/feedback/feedback.php";
            break;
        case 'chitietfeedback':
            extract($_REQUEST);
            $items = info_feedback($product_id);
            // $items=feedbacks_select_all();
            require_once "../admin/feedback/chitietfeedback.php";
            break;
    }
}
