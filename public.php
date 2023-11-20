<?php
    $IMAGE_DIR ="src/assets/images/";
    $MESSAGE="";
    $img_path="src/assets/images/products/";

    $homepage = " <a href='?url=trangchu'>Đi tới trang chủ</a>";

    function exist_param($fieldname){
        return array_key_exists($fieldname, $_REQUEST);
    }
    /**
     * Lưu file upload vào thư mục
     * @param string $fieldname là tên trường file
     * @param string $target_dir thư mục lưu file
     * @return tên file upload
     */
    function save_file($fieldname, $target_dir){ // Hàm lưu file, $fieldname là tên trường file, $target_dir là thư mục lưu file
        $file_uploaded = $_FILES[$fieldname]; // mảng chứa thông tin file
        $file_name = basename($file_uploaded["name"]); // lấy tên file
        $target_path = $target_dir . $file_name; // đường dẫn file
        move_uploaded_file($file_uploaded["tmp_name"], $target_path); // di chuyển file vào thư mục
        return $file_name; // trả về tên file
    }
    /**
     * Tạo cookie
     * @param string $name là tên cookie
     * @param string $value là giá trị cookie
     * @param int $day là số ngày tồn tại cookie
     */
    function add_cookie($name, $value, $day){
        setcookie($name, $value, time() + (86400 * $day),'/');
    }
    /**
     * Xóa cookie
     * @param string $name là tên cookie
     */
    function delete_cookie($name){
        add_cookie($name, '', -1);
    }
    /**
     * Đọc giá trị cookie
     * @param string $name là tên cookie
     * @return string giá trị của cookie
     */
    function get_cookie($name){
        return $_COOKIE[$name]??'';
    }
    /**
     * Kiểm tra đăng nhập và vai trò sử dụng.
     * Các php trong admin hoặc php yêu cầu phải được đăng nhập mới được
     * phép sử dụng thì cần thiết phải gọi hàm này trước
     **/
    function check_login(){
        global $SITE_URL;
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['role_id'] == 1){      
                return;
            }else if($_SESSION['user']['role_id'] == 2){
                if(strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE){
                    return;
                }
            }
            
            if(strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE && strpos($_SERVER["REQUEST_URI"], '/staff/') == FALSE){
                return;
            }
        }
        $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"];
    }
?>