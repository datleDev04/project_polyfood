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
                            $_SESSION["user"] = $user;
                            if (!isset($_SESSION['my_cart'])) {
                                $_SESSION['my_cart'] =[];      
                            }
                            echo"<script> loginSuccess() ;</script>";


                        } else {
                            $error['password'] = "Thông tin mật khẩu không chính xác!";
                        }
                    } else {
                        $error['user_name'] = "Thông tin tài khoản không chính xác!";
                    }
                }
                 else {
                    if (exist_param("btn_logoff")) {
                        unset($_SESSION['user']);
                        echo"<script> signOutSuccess() ;</script>";

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


            case 'doimk':
                // $user_id= $_SESSION['user']['user_id'];
                $password= $_SESSION['user']['password'];
                var_dump($password);
                $password2 = $password3 ="";
                $flag = true;
                if(isset($_POST['btn_change'])) {
                    $error = [];
                    $password2 = trim($_POST['password2']);
                    $password3 = trim($_POST['password3']);
                    $user_name = trim($_POST['user_name']);
                    $user_id = $_POST['user_id'];
                    
                    if (strlen($password2) < 6) {
                        $error['password2'] = "Mật khẩu mới phải có ít nhất 6 ký tự!";
                        $flag = false;
                    }
                    if (users_exist_by_password_id($password2, $user_id)) {
                        $error['password2'] = "Mật khẩu mới phải khác mật khẩu hiện tại!";
                        $flag = false;
                    }
                    if ($password2 != $password3) {
                        $error['password3'] = "Xác nhận mật khẩu mới không đúng!";
                        $flag = false;
                    }
                    if ($flag) {
                        $user = select_by_name_users($user_name);
                        if ($user) {
                            if ($user['password'] == $password) {
                                try {
                                    users_change_password_by_username($user_name, $password2);
                                    $_SESSION['user'] = select_by_name_users($user_name);
                                    echo"<script> changePasswordSuccess_Alert() ;</script>";
                                    
                                    // die;
                                } catch (Exception $exc) {
                                    echo"<script> changePasswordFail_Alert() ;</script>";
                                }
                            } else {
                                $error['password'] = "Mật khẩu không chính xác!";
                            }
                        } else {
                            $error['user_name'] = "Tên đăng nhập không chính xác!";
                        }
                    }
                }

                include_once"src/components/account/doimk.php";
                
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

                case 'search':
                    if (isset($_GET['filter'])) {
                        $keyword = $_GET['filter'];
                    }else {
                        $keyword = $_POST['search']; 
                    }
                    // var_dump($_SERVER['REQUEST_URI']);
                    // danh mục
                    $listall_category = loadall_category();
                    // sản phẩm
                    $listall_product = products_select_keyword($keyword,"");
                    if (isset($_GET['filter'])) {
                        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                                $typeFilter = $_POST["typeFilter"];

                        }

                        $listall_product = products_select_keyword($keyword,$typeFilter);
                    }
                    
                    if ($listall_product == []) {
                        $listall_product = loadall_product("","");
                        
                        echo"<script> searchErrors_Alert() ;</script>";

                    }
                    require_once "view/client/product.php";
                    break;
            
                
                case "product":
                    $listall_category = loadall_category();
                    if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                        $category_id = $_GET['category_id'];
                        $listall_product = loadall_product($category_id,"");
                    } else {
                        $category_id = "";
                        $listall_product = loadall_product($category_id,"");
                    }

                    if (isset($_GET['filter'])) {
                        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                            # code...
                                $typeFilter = $_POST["typeFilter"];
                                $listall_product = loadall_product("",$typeFilter);
                        }else {
                            $listall_product = loadall_product("","");
                        }
                    }
                    // $listall_product_cate = loadall_product_category($category_id);
                    // echo $listall_product_cate;
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
                            products_view_up($product_id);
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
                                // $total_price += $cart['total_price'];
                                $total_price += ($cart['price']* (1 - $cart['discount'] / 100))* $cart['quantity'];
                                $count += 1;
                            }
    
                        require_once"view/client/cart.php";
                    }else{
                        check_signIn();
                    }
                    
                    break;
                
                case "order":
                    $total_price_all = 0;
                    $address = "";
                        if (isset($_SESSION['my_cart'])) {
                            foreach (($_SESSION['my_cart']) as $item) {
                                extract($item);
                                $total_price_all += $price *(1 - $discount / 100) *$quantity;
                            }}

                        require_once"view/client/order.php";
                    break;


                case "payment":
                    if (isset($_POST['order'])) {
                    $address = $_POST['diachi'];

                        $total_price_all=0;
                        $user_id = $_SESSION['user']['user_id'];
                            $time_order = date("Y-m-d H:i:s");
                            $status = 0;
                            $note = $_POST['note'];
                            foreach ($_SESSION['my_cart'] as $cart) {
                                extract($cart);
                                $total_price_all += $price *(1 - $discount / 100) *$quantity ;
                                insert_order($product_id, $quantity, $user_id, $note, $status);
                                $oneProduct = loadone_product($product_id);
                                update_quantity($product_id,$oneProduct['quantity'] -$quantity);
                            }
                            //thêm note vào session my_cart
                            foreach ($_SESSION['my_cart'] as $key => $value) {
                                $_SESSION['my_cart'][$key]['note'] = $note;
                            }
                        
                        
                        unset($_SESSION['my_cart']);
                        require_once"view/client/payment.php";
                    }else {
                        echo "<meta http-equiv='refresh' content='0;URL=?url=order_oneProduct'/>";
                        exit();
                    }
                    break;

                case "my_ordered":

                    if (isset($_SESSION['user'])) {
                        $user_id = $_SESSION['user']['user_id'];
                        $user = select_by_id_users($user_id);
                        extract($user);
                        $order = join_order_product($user_id);
                        extract($order);
                        
                            if (isset($_GET['confirm_order']) || isset($_GET['cancel_order'])) {
                                # code...
                                if (isset($_GET['confirm_order'])) {
                                    $order_id = $_GET['confirm_order'];
                                    $status = 2;
                                    confirm_orderStatus($order_id,$status);
                                    echo"<script> Confirm_orderAlert() ;</script>";

                                    $order = join_order_product($user_id);
                                    extract($order);
                                }
                                if (isset($_GET['cancel_order'])) {
                                    $order_id = $_GET['cancel_order'];
                                    $status = 3;
                                    confirm_orderStatus($order_id,$status);
                                    echo"<script> Cancel_orderAlert() ;</script>";

                                    $order = join_order_product($user_id);
                                    extract($order);
                                }
                            }
                        
                        require_once"view/client/my-ordered.php";
                    }else {
                        check_signIn();
                    }
                    
                    break;

                case 'duyet_order':
                        $items = order_select_by_unfinished();

                        if (isset($_POST['btn_confirm'])) {
                            $order_id = $_POST['order_id'];
                            confirm_orderStatus($order_id,1);
                            echo"<script> delivery_orderAlert() ;</script>";
                            $items = order_select_by_unfinished();

                        }
                        
                        require_once "view/admin/oder/duyet_order.php";
                        break;

                    
                default:
                    require_once"view/client/home.php";
                break;
        }}else {
        require_once"view/client/home.php";
        }

    require_once"src/components/footer.php";