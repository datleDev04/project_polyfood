<?php
    session_start();
    require_once"models/pdo.php";
    require_once"public/public.php";
    require_once"models/categories.php";
    require_once"models/product.php";
    // require_once"/controllers/admin_controller";
    // require_once"/controllers/admin_controller";
    // require_once"/controllers/staff_controller";

    require_once"src/components/header.php";
    $url = isset($_GET['url']) ? $_GET['url'] : 'trang_chu';

    $list_categories = loadall_categories();
    if (isset($url) && $url !="") {
        switch ($url) {
            case "chitietsp":

                break;

                
            default:
            require_once"view/client/home.php";
                break;
        }
    }else {
        require_once"view/client/home.php";
    }

    require_once"src/components/footer.php";