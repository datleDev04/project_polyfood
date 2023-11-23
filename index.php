<?php
    session_start();
    require_once"models/pdo.php";
    require_once"public.php";
    require_once"models/categories.php";
    require_once"models/product.php";
    require_once"models/user.php";
    require_once"models/product.php";
    require_once"models/feedbacks.php";
    require_once"models/cart.php";
    require_once"models/orders.php";
    

    require_once"src/components/header.php";
    $url = isset($_GET['url']) ? $_GET['url'] : 'trang_chu';
    $user_name="";
    $password="";
    $email =""; 
    $phone ="";
    $name ="";

    $list_categories = loadall_categories();
    if (isset($url) && $url !="") {
        switch ($url) {
            case 'trangchu':
                require_once"view/client/home.php";
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
                            if (!isset($_SESSION['my_cart'])) {
                                $_SESSION['my_cart'] =[];
                            }
                            echo "<meta http-equiv='refresh' content='0;URL=?url=trangchu'/>";

                        } else {
                            $error['password'] = "Thông tin mật khẩu không chính xác!";
                        }
                    } else {
                        $error['user_name'] = "Thông tin tài khoản không chính xác!";
                    }
                }
                 else {
                    if (exist_param("btn_logoff")) {
                        $MESSAGE = "Đăng xuất thành công!";
                        unset($_SESSION['user']);
                    }
                    $user_name = get_cookie("user_name");
                    $password = get_cookie("password");
                }
                include_once"src/components/account/login.php";
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

                                $_SESSION['my_cart'] =[];
                            // header("location: " . "$SITE_URL/account/sign-in.php");
                            // die;
                        } catch (Exception $exc) {
                            $MESSAGE = "Đăng ký thành viên thất bại!";
                        }
                    }
                } else {
                    global $user_name, $password, $name, $email, $phone, $image, $role_id, $password2;
                }
                include_once"src/components/account/signup.php";
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

                include_once"src/components/account/quenmk.php";
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
                include_once"src/components/account/capnhattk.php";
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
                        extract($listone_product);
    
                        $user_feedbacks = join_feedbacks_user($product_id);
                        $count = count_feedbacks($product_id);
                        $price_discount = $price * (1 - $discount / 100);
    
                        require_once "view/client/detail_product.php";
                    break;
                
                case "feedback":
                    $user_id = $_SESSION['user']['user_id'];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        extract($_REQUEST);
                        if ( $note == "") {
                            echo"<script> FeedbackErrors_Alert() ;</script>";
                        }else{
                            insert_feedbacks($user_id, $product_id, $rating, $note);
                            echo "<script>FeedbackSuccess_Alert();</script>;";
                        
                        }
                    }   
                    $listone_product = loadone_product($product_id);
                    extract($listone_product);
                    $user_feedbacks = join_feedbacks_user($product_id);
                    $count = count_feedbacks($product_id);
                    $price_discount = $price * (1 - $discount / 100);



                    $product_cungloai = load_product_cungloai($product_id, $category_id);
                    require_once "view/client/detail_product.php";
                    
                    break;
                


                case 'cart':
                    
                    if (isset($_SESSION['user'])) {
                        
                        if (!isset($_SESSION['my_cart'])) {
                            $_SESSION['my_cart'] = [];
                        }
                        if (isset($_GET['addToCart'])) {
                            extract($_REQUEST);
                            $product_id = $_POST['product_id'];
                            $newProduct_toCart = products_select_by_id($product_id);
                            extract($newProduct_toCart);
                            $image = $_POST['image'];
                            $total_price = $price * (1 - $discount / 100) * $quantity;
                            $status = 0;
        
        
                            if (!empty($_SESSION['my_cart'])) {
                                foreach ($_SESSION['my_cart'] as  $cart => $key) {
                                    if ($product_id == $key['product_id']) {
                                        $add = false;
                                        break;
                                    } else {
                                        $add = true;
                                    }
                                }
                                if ($add) {
                                    $quantity = 1;
                                    $add_orders = [
                                        'product_id' => $product_id,
                                        'image' => $image,
                                        'quantity' => $quantity,
                                        'total_price' => $total_price,
                                        'status' => $status,
                                        'product_name' => $product_name,
                                        'price' => $price,
                                        'discount' => $discount,
                                        'category_id' => $category_id,
                                        'detail' => $detail,
                                    ];
                                    array_push($_SESSION['my_cart'], $add_orders);
                                } else {
                        
                                    $items_tmp = products_select_by_id($product_id);
                                    extract($items_tmp);
                                    $_SESSION['my_cart'][$cart]['quantity'] += 1;
                                    $quantity = $_SESSION['my_cart'][$cart]['quantity'];
                                    update_product_cart($quantity, $quantity * $price, $product_id);
                                }
                            } else {
                                $quantity = 1;
                                $add_orders = [
                                    'product_id' => $product_id,
                                    'image' => $image,
                                    'quantity' => $quantity,
                                    'total_price' => $total_price,
                                    'status' => $status,
                                    'product_name' => $product_name,
                                    'price' => $price,
                                    'discount' => $discount,
                                    'category_id' => $category_id,
                                    'detail' => $detail,
                                    'note1'=>''
                                ];
                                array_push($_SESSION['my_cart'], $add_orders);
                            }
                        }else if (isset($_GET['re_quantity'])) {
                            $quantity = $_POST["quantity"];
                            $id = $_POST["product_id"];
                            $items_tmp = products_select_by_id($id);
                            $price = $items_tmp["price"];
                            if ($_POST["choose"] == 1) {
                                $quantity += 1;
                            }
                            if ($_POST["choose"] == 0) {
                        
                                if ($quantity > 1) {
                                    $quantity -= 1;
                                } else {
                                    //nếu bé hơn 1 thì xóa mảng trong session
                                    foreach ($_SESSION['my_cart'] as $key => $value) {
                                        if ($value['product_id'] == $id) {
                                            unset($_SESSION['my_cart'][$key]);
                                        }
                                    }
                                }
                            }
                            update_product_cart($quantity, $quantity * $price, $id);
                        }else if (isset($_GET['btn_delete'])) {
                            extract($_REQUEST);
                            $id = $_POST["product_id"];
                            foreach ($_SESSION['my_cart'] as $key => $value) {
                                if ($value['product_id'] == $id) {
                                    unset($_SESSION['my_cart'][$key]);
                                }
                            }
                        }   
                        
                        $total_price = 0;
                            $count = 0;
                            products_select_all();
                            foreach ($_SESSION['my_cart'] as $cart) {
                                $total_price += $cart['total_price'];
                                $count += 1;
                            }
    
                        require_once"view/client/cart.php";
                    }else{
                        check_signIn();
                    }
                    
                    break;
                
                case "order":
                    
                    $total_price_all = 0;
                        if (isset($_SESSION['my_cart'])) {
                        foreach (($_SESSION['my_cart']) as $item) {
                            extract($item);
                            $total_price_all += $total_price;
                        }
                        }


                        require_once"view/client/order.php";
                    break;

                case "payment":
                    $user_id = $_SESSION['user']['user_id'];
                        $time_order = date("Y-m-d H:i:s");
                        $status = 0;
                        $note = $_POST['note'];
                        foreach ($_SESSION['my_cart'] as $cart) {
                            extract($cart);
                            insert_order($product_id, $quantity, $user_id, $note, $status);
                        }
                        //thêm note vào session my_cart
                        foreach ($_SESSION['my_cart'] as $key => $value) {
                            $_SESSION['my_cart'][$key]['note'] = $note;
                        }
                    
                    
                    unset($_SESSION['my_cart']);
                    require_once"view/client/payment.php";

                    break;

                case "my_ordered":
                    
                    if (isset($_SESSION['user'])) {
                        $user_id = $_SESSION['user']['user_id'];
                        $user = select_by_id_users($user_id);
                        extract($user);
                    }
                    $order = join_order_product($user_id);
                    extract($order);
                    require_once"view/client/my-ordered.php";
                    
                    break;
                    
                default:
                    require_once"view/client/home.php";
                break;
        }
    }else {
        require_once"view/client/home.php";
    }

    require_once"src/components/footer.php";