<?php
session_start();
require_once "models/pdo.php";
require_once "public/public.php";
require_once "models/categories.php";
require_once "models/product.php";
require_once "models/user.php";
require_once "models/product.php";
// require_once"/controllers/admin_controller";
// require_once"/controllers/admin_controller";
// require_once"/controllers/staff_controller";

require_once "src/components/header.php";
$url = isset($_GET['url']) ? $_GET['url'] : 'trang_chu';
$user_name = "";
$password = "";
$email = "";
$phone = "";
$name = "";

$list_categories = loadall_categories();
if (isset($url) && $url != "") {
    switch ($url) {
        case 'trangchu':
            require_once "view/client/home.php";
            break;
        case "dangnhap":
            extract($_REQUEST);

            if (exist_param("btn_login")) {
                $error = [];
                $user = select_by_name_users($user_name);
                // echo $user_name;
                if ($user) {
                    if ($user['password'] == $password) {
                        $MESSAGE = "Đăng nhập thành công!";
                        $_SESSION["user"] = $user;
                        $MESSAGE = "Đăng nhập thành thành công!";
                        echo "<meta http-equiv='refresh' content='0;URL=?url=trangchu'/>";
                    } else {
                        $error['password'] = "Thông tin mật khẩu không chính xác!";
                    }
                } else {
                    $error['user_name'] = "Thông tin tài khoản không chính xác!";
                }
            } else {
                if (exist_param("btn_logoff")) {
                    $MESSAGE = "Đăng xuất thành công!";
                    session_unset();
                }
                $user_name = get_cookie("user_name");
                $password = get_cookie("password");
            }
            include_once "src/components/account/login.php";
            break;
        case "dangky":
            extract($_REQUEST);

            if (exist_param("btn_register")) {
                $error = [];
                $user_name = trim($user_name);
                $name = trim($name);
                $password = trim($password);
                $phone = trim($phone);
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
                    $image_upload = save_file("image_upload", "$IMAGE_DIR/users/");
                    $image = strlen("$image_upload") > 0 ? $image_upload : "user.png";
                    try {
                        insert_users($user_name, $password, $name, $email, $phone, $image, $role_id);
                        $MESSAGE = "Đăng ký thành viên thành công!";
                        // header("location: " . "$SITE_URL/account/sign-in.php");
                        // die;
                    } catch (Exception $exc) {
                        $MESSAGE = "Đăng ký thành viên thất bại!";
                    }
                }
            } else {
                global $user_name, $password, $name, $email, $phone, $image, $role_id, $password2;
            }
            include_once "src/components/account/signup.php";
            break;

        case "quenmk":

            extract($_REQUEST);

            if (exist_param("btn_forgot")) {
                $error = [];
                $user = select_by_name_users($user_name);
                if ($user) {
                    if ($user['email'] != $email) {
                        $error['email'] = "Email không chính xác!";
                    } else {
                        $MESSAGE = "Mật khẩu của bạn là: " . $user['password'];
                        // $VIEW_NAME = "account/sign-in-form.php";
                        global $user_name, $password;
                    }
                } else {
                    $error['user_name'] = "Tên đăng nhập không chính xác!";
                }
            } else {
                global $user_name, $email;
            }

            include_once "src/components/account/quenmk.php";
            break;

        case 'capnhattk':
            check_login();
            extract($_REQUEST);

            if (exist_param("btn_update")) {
                $error = [];
                $name = trim($name);
                $phone = trim($phone);
                $flag = true;
                if (strlen($name) < 6) {
                    $error['name'] = "Họ và tên phải có ít nhất 6 ký tự!";
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
                    $image_upload = save_file("image_upload", "$IMAGE_DIR/users/");
                    $image = strlen("$image_upload") > 0 ? $image_upload : $image;
                    try {
                        update_users($user_name, $password, $name, $email, $phone, $image, $role_id, $user_id);
                        $MESSAGE = "Cập nhật thành công!";
                        $_SESSION['user'] = select_by_name_users($user_name);
                    } catch (Exception $exc) {
                        $MESSAGE = "Cập nhật thất bại!";
                    }
                }
            } else {
                extract($_SESSION['user']);
            }
            include_once "src/components/account/capnhattk.php";
            break;

            require_once "view/client/home.php";
            break;
       
    }
    
    
} else {
    require_once "view/client/home.php";
}

require_once "src/components/footer.php";
