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

    function check_signIn(){
        if (!isset($_SESSION['user'])) {
            echo" <script>NotSingIn()</script>";
        }
    }
?>




<script>
    function FeedbackErrors_Alert() {
            Swal.fire({
                title: 'Bạn chưa nhập đầy đủ thông tin!',
                text: 'Mời bạn tiếp tục đánh giá',
                icon: 'error'
            });
        }
    function FeedbackSuccess_Alert() {
            Swal.fire({
                title: 'Feedback thành công!',
                text: 'Cảm ơn bạn đã góp ý. Chúng tôi sẽ xem xét thông tin của bạn.',
                icon: 'success'
            });
        }
    function MinProduct_Alert() {
            Swal.fire({
                title: 'Lỗi',
                text: 'Phải có ít nhất một sản phẩm này',
                icon: 'error'
            });
        }
    function searchErrors_Alert() {
            Swal.fire({
                title: 'Lỗi',
                text: 'KHÔNG TÌM THẤY SẢN PHẨM',
                icon: 'error'
            });
        }
    function NotSingIn() {
        Swal.fire({
            title: 'BẠN CHƯA ĐĂNG NHẬP  ',
            text: 'Vui lòng đăng nhập để có thể thêm sản phẩm vào giỏ hàng.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Đăng nhập',
            cancelButtonText: 'Đóng',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý đăng ký ở đây
                // Nếu người dùng đăng ký thành công, bạn có thể thêm sản phẩm vào giỏ hàng.
                // Swal.fire('Đăng ký thành công!', 'Bây giờ bạn có thể thêm vào giỏ hàng.', 'success');
                window.location.href = '?url=dangnhap';
            } else {
                window.location.href = '?url=trangchu';

            }
        });
    }
    // function submitChildForm(event) {
    // event.preventDefault();

    // // Lấy dữ liệu từ form
    // var formData = new FormData(document.getElementById("childForm"));

    // // Thực hiện yêu cầu Ajax
    // var xhr = new XMLHttpRequest();
    // xhr.open("POST", "process_child_form.php", true);
    // xhr.onreadystatechange = function() {
    //     if (xhr.readyState == 4 && xhr.status == 200) {
    //         // Xử lý kết quả từ server nếu cần
    //         console.log(xhr.responseText);
    //     }
    // };
    // xhr.send(formData);
    //}

    function submitChildForm(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của trình duyệt
        // Thực hiện xử lý JavaScript hoặc gọi AJAX tại đây nếu cần
        document.getElementById("childForm").submit(); // Tiến hành submit form con
    }
</script>

<!-- $price_discount = $price * (1 - $discount / 100); -->