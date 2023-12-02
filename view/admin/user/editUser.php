
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="./IMG/favicon.ico" sizes="16x16" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="src/css/index.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ADMIN</title>
</head>

<body>
    <div id="root" class="font-montserrat min-w-[320px] max-w-[1400px] mx-auto">
        <div class="wrapper w-full flex gap-3 p-3">
            <aside style="
            border-radius: 30px;
            background: #fff;
            box-shadow: 20px 20px 60px #bebebe, -20px -20px 60px #ffffff;
          " class="w-[15%] flex flex-col gap-5 p-5">
                <ul class="w-full menu__bar flex flex-col justify-center gap-5 p-3">
                    <li class="menu__bar-item flex gap-3 items-center">
                        <img style="width: 22px;" src="./src/assets/icons/home.png" alt="">
                        <a href="" class="font-medium text-md ml-3 text-gray-500">Trang chính</a>
                    </li>
                    <li class="menu__bar-item flex gap-3 items-center">
                        <img style="width: 22px;" src="src/assets/icons/product.png" alt="">
                        <a href="" class="font-medium text-md ml-3 text-gray-500">Sản phẩm</a>
                    </li>
                    <li class="menu__bar-item flex gap-3 items-center" name="btn_list">
                        <img style="width: 22px;" src="src/assets/icons/category.png" alt="">
                        <a href="index.php?url=listdm" class="font-medium text-md ml-3 text-gray-500">Danh mục</a>
                    </li>
                    <li class="menu__bar-item flex gap-3 items-center">
                        <img style="width: 22px;" src="src/assets/icons/user.png" alt="">
                        <a href="index.php?url=listUser" class="font-medium text-md ml-3 text-gray-500">Người dùng</a>
                    </li>
                    <li class="menu__bar-item flex gap-3 items-center">
                        <img style="width: 22px;" src="src/assets/icons/bubble-chat.png" alt="">
                        <a href="" class="font-medium text-md ml-3 text-gray-500">Bình luận</a>
                    </li>
                    <li class="menu__bar-item flex gap-3 items-center">
                        <img style="width: 22px;" src="src/assets/icons/shopping-cart.png" alt="">
                        <a href="" class="font-medium text-md ml-3 text-gray-500">Đơn hàng</a>
                    </li>
                    <li class="menu__bar-item flex gap-3 items-center">
                        <img style="width: 22px;" src="src/assets/icons/feedback.png" alt="">
                        <a href="" class="font-medium text-md ml-3 text-gray-500">Phản hồi</a>
                    </li>
                    <li class="menu__bar-item flex gap-3 items-center">
                        <img style="width: 22px;" src="src/assets/icons/analysis.png" alt="">
                        <a href="index.php?url=listchart" class="font-medium text-md ml-3 text-gray-500">Thống kê</a>
                    </li>
                    <li class="menu__bar-item flex gap-3 items-center">
                        <img style="width: 22px;" src="src/assets/icons/back.png" alt="">
                        <a href="" class="font-medium text-md ml-3 text-gray-500">Về trang chủ</a>
                    </li>
                </ul>
            </aside>
            <!-- End aside -->

            <article class="w-[85%]">
    <header style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px #bebebe,
-35px -35px 70px #ffffff;
" class="w-full h-[60px] flex items-center justify-between px-5 py-2">
        <div class="logo-[100px] h-auto px-2 flex gap-2 items-center justify-center">
            <a href="../../index.php">
                <img src="../../site/IMG/logo.png" alt="logo" class="w-16 h-auto" />
            </a>

        </div>
        <div class="account__admin flex items-center gap-2">
            <div class="account__admin--avatar">

                <img src="<?= $CONTENT_URL ?>/images/users/<?= $_SESSION['user']['image'] ?>" alt="" class="w-10 h-10 rounded-full" />
            </div>
            <div class="account__admin--name flex flex-col gap-1">
                <p class="font-medium text-sm text-gray-500">
                    <?= $_SESSION['user']['name'] ?>
                </p>
                <a href="index.php?action=logout" class="logout text-xs text-gray-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    Logout
                </a>
            </div>
        </div>
    </header>
    <!-- End header -->
    <main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70pxrole
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
        <?php
        if (strlen($MESSAGE)) {
            echo "<h5>$MESSAGE</h5>";
        }
        ?>
        <section class="add__user w-full mt-5">
            <section class="add__products-title flex  items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h1 class="text-left lg:text-xl text-gray-500 uppercase">Cật nhật tài khoản</h1>
            </section>

            <section class="mt-5  w-full">
                <form action="?url=editUser" class="form__add-user w-full" method="post" enctype="multipart/form-data">
                    <div class="list__form-group w-full grid  grid-cols-2 gap-5">
                        <div class="form__group flex flex-col">
                            <label for="usertid" class="text-gray-500 text-xs sm:text-sm md:text-base lg:text-base">USER
                                ID</label>
                            <input readonly type="text" name="user_id" id="user__id" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none
text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3
rounded-md text-gray-500
" value="<?= $user_id ?>" />
                        </div>
                        <div class="form__group flex flex-col">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">USER
                                NAME</label>
                            <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="user_name" id="name" placeholder="Nhập user name..." value="<?= $user_name ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['user_name']) ? $error['user_name'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Họ và
                                tên</label>
                            <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="name" id="name" placeholder="Nhaaoj họ và tên..." value="<?= $name ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['name']) ? $error['name'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Mật
                                khẩu</label>
                            <input type="password" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="password" id="name" placeholder="******" value="<?= $password ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['password']) ? $error['password'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Địa chỉ
                                email</label>
                            <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="email" id="name" placeholder="Nhập email..." value="<?= $email ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['email']) ? $error['email'] : ''; ?>
                            </span>
                        </div>

                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Số điện
                                thoại</label>
                            <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="phone" id="name" placeholder="Nhập số điện thoại" value="<?= $phone ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['phone']) ? $error['phone'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Vai
                                trò</label>

                            <select name="role_id" class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm  bg-gray-100 rounded-md text-gray-500">
                                <option value="">Chọn vai trò</option>
                                <?php foreach ($roles as $role) : ?>
                                    <?php extract($role) ?>
                                    <option value="<?= $role_id ?>"><?= $role_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Ảnh đại
                                diện</label>
                            <input type="hidden" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-1 px-3  rounded-md text-gray-500 " name="image" id="name" value="<?= $image ?>" />
                            <input type="file" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="upload_image" id="name" />
                            (<?= $image ?>)
                        </div>
                    </div>
                    <div class="form__add-user--list-button w-full mt-7 flex gap-3 justify-center items-center">
                        <button type="submit" name="btn_update" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                            Cập nhật
                        </button>
                        <button type="reset" name="reset" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                            Nhập lại
                        </button>
                        <a href="?url=listUser" name="btn_list" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border  text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                            Danh sách người dùng
                        </a>
                    </div>
                </form>
            </section>
        </section>
        <!-- End add_product -->
    </main>
</article>
        </div>
    </div>
</body>

</html>