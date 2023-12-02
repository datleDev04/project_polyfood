<?php
session_start();
require_once "../../models/pdo.php";
require_once "../../models/categories.php";
require_once "../../models/product.php";
require_once "../../public/public.php";
require_once "../../models/user.php";
require_once "../../models/roles.php";
require_once "../../models/chart.php";

$url = isset($_GET['url']) ? $_GET['url'] : 'trang_chu';
// controler
// xét trg hợp khi gửi yêu cầu --> hiển thị cái gì
// kiểm tra giá trị của url
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    switch ($url) {
        case 'adddm':
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
                    $upload_category_image = save_file("category_image", "../../src/assets/images/categories/");
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
            $category_name = $suggest = "";
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
                $flag = true;
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
            if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                categories_delete($_GET['category_id']);
                $MESSAGE = "Xóa thành công!";
            }
            $listcategories = loadall_categories();
            require_once "categories/list.php";
            break;
            //
            //
            //
            //User
            //
        case 'listUser':
            $user = select_all_users();
            require_once "user/listUser.php";
            break;

        case 'addUser':
            $user_name = "";
            $name = "";
            $password = "";
            $password2 = "";
            $phone = "";
            $email = "";
            $error = [];
            // echo"1";


            if (isset($_POST['insert'])) {

                $user_name = trim($_POST['user_name']);
                $name = trim($_POST['name']);
                $password = trim($_POST['password']);
                $password2 = trim($_POST['password2']);
                $phone = trim($_POST['phone']);
                $email = trim($_POST['email']);
                $role_id = $_POST['role_id'];
                $flag = true;
                if (strlen($user_name) < 6) {
                    $error['user_name'] = "Tên đăng nhập phải có ít nhất 6 ký tự!";
                    $flag = false;
                }
                if (users_exist_by_username($user_name)) {
                    $error['user_name'] = "Tên đăng nhập này đã được sử dụng!";
                    $flag = false;
                }
                if (strlen($name) < 6) {
                    $error['name'] = "Họ và tên phải có ít nhất 6 ký tự!";
                    $flag = false;
                }
                if (strlen($password) < 6) {
                    $error['password'] = "Mật khẩu phải có ít nhất 6 ký tự!";
                    $flag = false;
                }
                if ($password != $password2) {
                    $error['password2'] = "Xác nhận mật khẩu không đúng!";
                    $flag = false;
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = "Email không đúng định dạng!";
                    $flag = false;
                }
                if (users_exist_by_email($email)) {
                    $error['email'] = "Email này đã được sử dụng!";
                    $flag = false;
                }
                if (strlen($phone) != 10 || !is_numeric($phone)) {
                    $error['phone'] = "Vui lòng nhập số điện thoại!";
                    $flag = false;
                }
                if (!preg_match('/((09|03|07|08|05)+([0-9]{8})\b)/', $phone)) {
                    $error['phone'] = "Số điện thoại không đúng!";
                    $flag = false;
                }
                if (users_exist_by_phone($phone)) {
                    $error['phone'] = "Số điện thoại này đã được sử dụng!";
                    $flag = false;
                }
                if ($flag) {
                    $upload_image = save_file("image", "../../src/assets/images/users/");
                    $image = strlen("$upload_image") > 0 ? $upload_image : 'user.png';
                    try {
                        insert_users($user_name, $password, $name, $email, $phone, $image, $role_id);
                        unset($user_name, $password, $name, $email, $phone, $image, $role_id);
                        $MESSAGE = "Thêm mới thành công!";
                    } catch (Exception $exc) {
                        $MESSAGE = "Thêm mới thất bại!";
                    }
                    global $user_name, $password, $name, $email, $phone, $image, $role_id, $password2;
                }
            }
            $roles = roles_select_all();
            require_once "user/addUser.php";
            break;

            ////Thong ke
        case 'listchart':

            $items = statistic_products();
            require_once "statistics/listchart.php";
            break;

        case 'chart':
            
                require_once "statistics/chart.php";
            break;
        case 'editUser':
            $roles = roles_select_all();
            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
                $item = select_by_id_users($user_id);
                extract($item);
            }
            if (isset($_POST['btn_update'])) {
                $error = [];
                $user_id = $_POST['user_id'];
                $user_name = trim($_POST['user_name']);
                $name = trim($_POST['name']);
                $password = trim($_POST['password']);
                $phone = trim($_POST['phone']);
                $email = trim($_POST['email']);
                $role_id = $_POST['role_id'];
                $image = $_POST['image'];
                $flag = true;
                if (strlen($user_name) < 6) {
                    $error['user_name'] = "Tên đăng nhập phải có ít nhất 6 ký tự!";
                    $flag = false;
                }
                if (users_exist_by_username_id($user_name, $user_id)) {
                    $error['user_name'] = "Tên đăng nhập này đã được sử dụng!";
                    $flag = false;
                }
                if (strlen($name) < 6) {
                    $error['name'] = "Họ và tên phải có ít nhất 6 ký tự!";
                    $flag = false;
                }
                if (strlen($password) < 6) {
                    $error['password'] = "Mật khẩu phải có ít nhất 6 ký tự!";
                    $flag = false;
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = "Email không đúng định dạng!";
                    $flag = false;
                }
                if (users_exist_by_email_id($email, $user_id)) {
                    $error['email'] = "Email này đã được sử dụng!";
                    $flag = false;
                }
                if (strlen($phone) != 10 || !is_numeric($phone)) {
                    $error['phone'] = "Vui lòng nhập số điện thoại!";
                    $flag = false;
                }
                if (!preg_match('/((09|03|07|08|05)+([0-9]{8})\b)/', $phone)) {
                    $error['phone'] = "Số điện thoại không đúng!";
                    $flag = false;
                }
                if (users_exist_by_phone_id($phone, $user_id)) {
                    $error['phone'] = "Số điện thoại này đã được sử dụng!";
                    $flag = false;
                }
                if ($flag) {
                    $upload_image = save_file("upload_image", "../../src/assets/images/users/");
                    $image = strlen("$upload_image") > 0 ? $upload_image : $image;
                    try {
                        update_users($user_name, $password, $name, $email, $phone, $image, $role_id, $user_id);
                        $MESSAGE = "Cập nhật thành công!";
                    } catch (Exception $exc) {
                        $MESSAGE = "Cập nhật thất bại!";
                    }
                }
            }
            
            require_once "user/editUser.php";
            break;
        case 'delUser':
            if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
                delete_users($_GET['user_id']);
                $MESSAGE = "Xóa thành công!";
            }
            $user = select_all_users();
            require_once "user/listUser.php";
            break;
    }
} else {
    require_once "../admin/index.php";
}
