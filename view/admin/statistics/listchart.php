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

                            <img src="<?= $CONTENT_URL  ?>/images/users/<?= $_SESSION['user']['image'] ?>" alt="" class="w-10 h-10 rounded-full" />
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
                <main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
                    <section class="list__accounts w-full">
                        <section class="list__accounts-title  flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-gray-500">
                                <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0A.75.75 0 018.25 6h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75zM2.625 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12A.75.75 0 017.5 12zm-4.875 5.25a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                            </svg>

                            <h1 class="text-left text-xl text-gray-500 uppercase">
                                Thống kê hàng hóa
                            </h1>
                        </section>
                        <form action="index.php?url=chart" method="post">
                            <div class="list__accounts-table w-full   mt-4">
                                <table class="w-[600px] mx-auto text-center rounded-md shadow-md my-3">
                                    <thead class="boder bg-gray-200 px-2 rounded-t-md">
                                        <tr>
                                            <th class=" text-xs  p-2 w-20 font-medium">
                                                Loại hàng
                                            </th>
                                            <th class=" text-xs  px-2 py-2 font-medium">
                                                Số lượng
                                            </th>
                                            <th class=" text-xs  px-2 py-2 font-medium">
                                                Gía cao nhất
                                            </th>
                                            <th class=" text-xs  px-2 py-2 font-medium">
                                                Gía thấp nhất
                                            </th>
                                            <th class=" text-xs  px-6 py-2 font-medium">
                                                Trung bình
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($items as $item) : ?>
                                            
                                            <?php extract($item); ?>
                                            
                                            <tr class="border-t-2 border-dashed">

                                                <td class="p-2 w-20 ">
                                                    <p class="text-xs text-gray-900 truncate w-32 overflow-hidden">
                                                        <?= $category_name ?>
                                                    </p>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <p class="text-xs text-gray-900">
                                                        <?= $total ?>
                                                    </p>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <p class="text-xs text-gray-900">
                                                        <?= number_format($price_min, 2) ?>
                                                    </p>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <p class="text-xs text-gray-900">
                                                        <?= number_format($price_max, 2) ?>
                                                    </p>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <p class="text-xs text-gray-900">
                                                        <?= number_format($price_avg, 2) ?>
                                                    </p>
                                                </td>
                                            <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="list__accounts-table--button w-full  px-5 mt-7 flex justify-center gap-5">

                                <button style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow:
1.5px 1.5px 2.5px #babecc, -2px -2px 5px #fff;" type="submit" name="chart" class=" p-3  border rounded-md  text-center   text-xs hover:bg-gray-200 leading-4 ">
                                    
                                        Biểu đồ thống kê
                                </button>
                            </div>
                        </form>
                    </section>
                </main>

            </article>
        </div>
    </div>
</body>

</html>
</div>
</div>
</body>

</html>