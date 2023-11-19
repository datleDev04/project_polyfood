<?php
session_start();
require_once "models/pdo.php";
require_once "public/public.php";
require_once "models/categories.php";
require_once "models/product.php";
require_once "tongquan.php";
require_once "models/feedbacks.php";
require_once "global.php";

// require_once"/controllers/admin_controller";
// require_once"/controllers/admin_controller";
// require_once"/controllers/staff_controller";
// $listone_product = loadone_product($product_id);
// $listone_category = loadone_category($category_id);
//thế product_id hiện đang = gì, và lấy từ đâu ?

require_once "src/components/header.php";
$url = isset($_GET['url']) ? $_GET['url'] : 'trang_chu';


if (isset($url) && $url != "") {
    switch ($url) {
        
        case "detail_product":
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = $_GET['product_id'];
            } else {
                $product_id = "";
            }
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $id = $_GET['product_id'];
                $listone_product = loadone_product($product_id);
                extract($listone_product);
                $product_cungloai = load_product_cungloai($product_id, $category_id);
            }
            $listone_product = loadone_product($product_id);
            require_once "view/client/detail_product.php";
            break;
        case "allproduct":

            // danh mục
            $listall_category = loadall_category();
            // sản phẩm
            $listall_product = loadall_product("");
            require_once "view/client/product.php";
            break;
        case "product":
            $listall_category = loadall_category();
            if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                $category_id = $_GET['category_id'];
            } else {
                $category_id = "";
            }
            // $listall_product_cate = loadall_product_category($category_id);
            // echo $listall_product_cate;
            $listall_product = loadall_product($category_id);
            require_once "view/client/product.php";
            break;
        default:
            require_once "view/client/home.php";

            break;
    }
} else {
    require_once "view/client/home.php";
}

require_once "src/components/footer.php";
