<?php 
// extract($_REQUEST);
// $cates = categories_select_all();
// if (exist_param("category_id")) {
//     $items = products_select_by_categories($category_id);
// } else if (exist_param("search_product")) {
//     $items = products_select_keyword($keyword);
// } else {
//     $items = products_select_all();
// }



// $user_feedbacks = join_feedbacks_user($product_id);
// $count = count_feedbacks($product_id);
// extract($_REQUEST);
// $items = products_select_by_id($product_id);
// extract($items);
// $category_id = $items['category_id'];
?>

<section class="max-w-6xl mx-auto mt-10">

    <div class="grid gap-12 p-6 bg-white rounded-lg shadow-md md:grid-cols-2">
        <div class="rounded-lg">
            <?php
            $hinh = $img_path . $image ?>
            <img src="<?= $hinh ?>" alt="" class="rounded-xl">
        </div>
        <div class="">
            <form action="?url=cart&addToCart" method="POST">
                <input type="hidden" name="product_id" id="product_id" value="<?= $listone_product['product_id'] ?>">
                <input type="hidden" name="product_name" id="product_name" value="<?= $listone_product['product_name'] ?>">
                <input type="hidden" name="price" id="price" value="<?= $listone_product['price'] ?>">
                <input type="hidden" name="image" id="image" value="<?= $listone_product['image'] ?>">

                <div class="text-3xl font-bold text-gray-700"><?= $product_name ?></div>
                <div class="flex items-center py-4 space-x-2 ">
                    <p class="text-sm text-gray-500">
                        <?php
                        $avg = avg_feedbacks($listone_product['product_id']);
                        if ($avg == 0) {
                            echo "Chưa có đánh giá";
                        } else if ($avg <= 1) {
                            echo "★";
                        } else if (1 < $avg && $avg <= 2) {
                            echo "★★";
                        } else if (2 < $avg && $avg <= 3) {
                            echo "★★★";
                        } else if (3 < $avg && $avg <= 4) {
                            echo "★★★★";
                        } else if (4 < $avg && $avg <= 5) {
                            echo "★★★★★";
                        }

                        ?>

                    </p>
                    <p class="text-sm text-orange-500">/</p>
                    <p class="text-sm text-gray-500"><?= $count ?>
                        Phản hồi
                    </p>
                </div>
                <div class="flex space-x-2 text-3xl text-orange-600 my-4">

                        <strike class="text-3xl font-light text-gray-400"><?= number_format($price, 0, ",", ".") ?>
                            đ</strike>
                        <p class="flex gap-2 text-3xl"> <span></span>
                            <?= number_format($price_discount, 0, ",", ".") ?>đ
                    </div>

                
                <div class="flex items-center space-x-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-orange-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>

                    <p class="font-light text-gray-500">
                        Hỗ trợ tận tình , đồ ăn tận răng !
                    </p>
                </div>
                <div class="flex items-center py-2 space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-orange-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>

                    <p class="font-light text-gray-500">
                        Đồ ăn sẵn sàng , điện thoại reo
                    </p>
                </div>
                <!-- <button class="flex items-center px-5 py-2 mt-5 text-sm text-white bg-orange-600 rounded-lg">
                    <p class="px-2">Thêm vào giỏ</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </button> -->
                <div class ="flex justify-start">
                    <button class="flex items-center px-5 py-2 mt-5 text-sm text-white bg-orange-600 rounded-lg">
                        <p class="px-2 font-bold text-base">Thêm vào giỏ</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="max-w-6xl mx-auto mt-20">
        <div class="flex items-center justify-center space-x-4 button-box">
            <div id="btn" class="inlinde-block md:mr-44  text-xl text-center rounded-xl md:w-[90px] md:h-[48px] border-red-500 bg-orange-500">
            </div>
            <button type="button" class="toggle-btn" onclick="leftClick()"><span id="trai" class="inline-block px-8 py-2 text-xl text-white rounded-xl sili">Mô tả</span></button>
            <button type="button" class="toggle-btn" onclick="rightClick()"><span id="phai" class="inline-block px-8 py-2 text-xl text-red-500 rounded-xl ">Nhận xét ( <?= $count ?>
                    )</span></button>
        </div>
        <p class="px-6 py-6 font-light text-gray-500 text-md" id="description"><?= $detail ?></p>
        <div class="hidden px-16 py-12" id="comment">

            <?php


            $today = gmdate('Y-m-d');
            $first_date = strtotime($today);


            foreach ($user_feedbacks as $fb) :
                $second_date = strtotime($fb['time_send']);
                $datediff = abs($first_date - $second_date);
                $count_date = floor($datediff / (24 * 60 * 60));
            ?>

                <div class="grid grid-cols-[48px,auto] gap-8 pt-[40px] pb-3 border-b border-gray-300">
                    <div class="rounded-full rounded-2 rounded-red-500 w-[48px] h-[48px]">
                        <img src="src/assets/images/users/<?= $fb['img_user'] ?>" style="border-radius:50%" alt="">
                    </div>
                    <div class="">
                        <div class="flex items-center space-x-4">
                            <h1 class="font-bold text-md"><?= $fb['name_user'] ?></h1>
                            <p class="text-gray-400 text-md">
                                <?= $count_date < 30 ? $count_date . ' ngày' : floor($count_date / 30) . ' tháng' ?> trước
                            </p>
                        </div>
                        <div class="text-yellow-500">

                            <?php
                            if ($fb['rate'] == 1) {
                                echo '★';
                            } else if ($fb['rate'] == 2) {
                                echo '★★';
                            } else if ($fb['rate'] == 3) {
                                echo '★★★';
                            } else if ($fb['rate'] == 4) {
                                echo '★★★★';
                            } else if ($fb['rate'] == 5) {
                                echo '★★★★★';
                            }

                            ?>

                        </div>
                        <div class="text-md"><?= $fb['content'] ?></div>
                    </div>
                </div> 

            <?php endforeach; ?>

            <form action="index.php?url=feedback" method="post" enctype="multipart/form-data">
                <input type="hidden" id="product_id" name="product_id" value="<?= $product_id ?>">
                <?php
                if (isset($_SESSION['user'])) { ?>

                    <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user']['user_id'] ?>">
                <?php
                }
                ?>

                <div class=" grid grid-cols-[100px,auto]  mt-10">
                    <div class="rounded-full flex items-center gap-5 rounded-2 rounded-red-500 w-[100px] h-[48px]">
                        <img src="<?= $CONTENT_URL . '/images/users/' ?><?= isset($_SESSION['user']) ? $_SESSION['user']['image'] : 'user.png' ?>" alt="" class="rounded-full w-[48px] h-[48px]">
                        <span class="text-gray-500 whitespace-nowrap">
                            <?= isset($_SESSION['user']) ? $_SESSION['user']['name'] : '<h4 class="font-bold text-red-600">RẤT TIẾC BẠN CHƯA ĐĂNG NHẬP</h4>' ?>
                        </span>
                        
                    </div>
                    <div class="mt-5 space-y-2">
                        <div class="flex flex-col items-center py-4 space-x-4 lg:flex-row">
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5" checked/><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                            </fieldset>
                            <p class="text-sm text-gray-500">(Vui lòng chọn đánh giá)</p>
                        </div>
                        <textarea id="note" name="note" placeholder="Điền đánh giá ...." class="md:w-[612px] md:h-[97px] border-2 rounded px-4 py-1"></textarea>
                        <br>
                        <?php

                        if (isset($_SESSION['user'])) {
                            echo "<button type='submit' class='px-10 py-2 text-white bg-orange-500 rounded'>Gửi</button>";
                        }else {
                            
                            echo "<h5 class='text-red-500'><a class='font-bold  text-blue-700' href='?url=dangnhap'>Đăng nhập</a> để bình luận</h5>";
                        }
                        ?>
                        
                    </div>
                </div>

            </form>
        </div>
    </section>

</section>
<section class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold text-center text-orange-500">Có thể bạn cũng thích</h1>
    <div class="grid grid-cols-2 gap-4 py-4 md:grid-cols-4">
        <?php
        require_once "view/client/product_cungloai.php";
        ?>
    </div>

</section>

<script>
var description = document.getElementById('description');
var comment = document.getElementById('comment');
var btn = document.getElementById('btn');
var trai = document.getElementById('trai');
var phai = document.getElementById('phai');


function leftClick() {
    btn.style.left = '430px';
    description.style.display = "block";
    comment.style.display = "none";
    btn.style.width = "115px";
    trai.style.color = "white";
    phai.style.color = "red";
}

function rightClick() {
    btn.style.left = '561px';
    comment.style.display = "block";
    description.style.display = "none";
    btn.style.width = "175px";
    phai.style.color = "white";
    trai.style.color = "red";

}
</script>