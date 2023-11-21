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
    if(isset($_GET['url'])){
        $url = $_GET['url'];
        switch ($url) {
            // case 'adddm':
            //     //kiểm tra xem người dùng có click vào nút add hay không
            //     if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
            //         $categories_name= $_POST['name'];
            //         insert_categories($categories_name);
            //         $thongbao="Thêm thành công";
            //     }
            //     require_once "../admin/categories/add.php";
            //     break;
            case 'listdm':
                $listcategories=loadall_categories();
                require_once "categories/list.php";
                break;
            // case 'xoadm':
            //     if(isset($_GET['id']) && ($_GET['id']>0)){
            //         categories_delete($_GET['id']);
            //     }
            //     $listcategories=loadall_categories();
            //     require_once "../admin/categories/list.php";
            //     break;
            // case 'suadm':
            //     if(isset($_GET['id']) && ($_GET['id']>0)){
            //         $dm=categories_select_by_id($_GET['id']);
            //     }
                
            //     require_once "../admin/categories/update.php";
            //     break;
            // case 'updatedm':
            //     if(isset($_POST['capnhap']) && ($_POST['capnhap'])){
            //         $categories_name = $_POST['tenloai'];
            //         $id =$_POST['id'];
            //         update_categories($id,$categories_name);
            //         $thongbao="cập nhập thành công";
            //     }

            //     $listcategories=loadall_categories();
            //     require_once "../admin/categories/list.php";
            //     break;

            // /* Controller Sản phẩm*/

            }

    }else{
        require_once "../admin/home.php";
    }
?>