<?php
session_start();
require_once "../../models/pdo.php";
require_once "../../models/categories.php";
require_once "../../models/product.php";
require_once "../../public/public.php";
$url = isset($_GET['url']) ? $_GET['url'] : 'trang_chu';
// controler
// xét trg hợp khi gửi yêu cầu --> hiển thị cái gì
// kiểm tra giá trị của url
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    switch ($url) {
        case 'adddm':
            //kiểm tra xem người dùng có click vào nút add hay không
            $category_name = "";
            $suggest = "";
            $category_image = "";
            $error = [];
            if (isset($_POST['btn_insert'])) {
                extract($_REQUEST);
                $category_name = trim($category_name);
                $suggest = trim($suggest);
                $flag = true;
                if (strlen($category_name) <= 0) {
                    $error['category_name'] = "Bạn chưa nhập tên danh mục!";
                    $flag = false;
                }
                if (categories_name_exist($category_name)) {
                    $error['category_name'] = "Tên danh mục này đã tồn tại!";
                    $flag = false;
                }
                if (strlen($suggest) <= 0) {
                    $error['suggest'] = "Bạn chưa nhập gợi ý!";
                    $flag = false;
                }
                if ($flag) {
                    $upload_category_image = save_file("category_image", "../../src/assets/images/categories");
                    $category_image = strlen("$upload_category_image") > 0 ? $upload_category_image : 'category.png';
                    try {
                        insert_categories($category_name, $category_image, $suggest);
                        $MESSAGE = "Thêm danh mục thành công";
                        unset($category_name, $category_id, $category_image, $suggest);
                    } catch (Exception $exc) {
                        $MESSAGE = "Thêm danh mục thất bại";
                    }
                    global $category_name, $category_id, $category_image, $suggest;
                }
            }
            require_once "categories/addCategories.php";
            break;

        case 'listdm':
            $listcategories = loadall_categories();
            require_once "categories/list.php";
            break;

        case 'editdm':
            $category_name = $suggest="";
            if (isset($_GET['category_id'])) {
                $category_id = $_GET['category_id'];
                $item = categories_select_by_id($category_id);
                extract($item);
            }
            if (isset($_POST['btn_update'])) {
                $category_name = $_POST['category_name'];
                $category_id = $_POST['category_id'];
                $suggest = $_POST['suggest'];
                $category_image = $_POST['category_image'];
                $flag=true;
                if (strlen($category_name) <= 0) {
                    $error['category_name'] = "Bạn chưa nhập tên danh mục!";
                    $flag = false;
                }
                if (categories_name_exist_id($category_name, $category_id)) {
                    $error['category_name'] = "Tên danh mục này đã tồn tại!";
                    $flag = false;
                }
                if (strlen($suggest) <= 0) {
                    $error['suggest'] = "Bạn chưa nhập gợi ý!";
                    $flag = false;
                }
                if ($flag) {
                    $upload_category_image = save_file("upload_category_image", "../../src/assets/images/categories");
                    $category_image = strlen("$upload_category_image") > 0 ? $upload_category_image : $category_image;
                    try {
                        update_categories($category_name, $category_image, $suggest, $category_id);
                        $MESSAGE = "Cập nhật danh mục thành công";
                    } catch (Exception $exc) {
                        $MESSAGE = "Cập nhật danh mục thất bại";
                    }
                }
            }
            $listcategories = loadall_categories();
            require_once "categories/editCategory.php";
            break;
        case 'deletedm':
            // echo "hehe";
            
                if (isset($_GET['category_id'])&& ($_GET['category_id'] > 0)) {
                    categories_delete($_GET['category_id']);
                    $MESSAGE = "Xóa thành công!";
                }
                $listcategories = loadall_categories();
                require_once "categories/list.php";
                break;
            
    }
} else {
    require_once "../admin/index.php";
}
