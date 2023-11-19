<section class="max-w-7xl mx-auto px-10">
        <div class="grid md:grid-cols-[190px,auto] mt-10 p-4">
            <div class="hidden md:block">
                <h1 class="text-3xl text-orange-500 font-medium">Danh mục</h1>
                <div style="
              background: rgba(255, 255, 255, 0.25);
              box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.23);
              backdrop-filter: blur(4px);
              -webkit-backdrop-filter: blur(4px);
              border-radius: 10px;
              border: 1px solid rgba(255, 255, 255, 0.18);" class="mt-5 p-3 bg-white">
                    <ul class="space-y-4">
                        <a href="<?= $SITE_URL ?>/page/product.php">
                            <li class="rounded py-2 px-2 text-gray-700 font-medium">Tất cả </li>
                        </a>

                        <?php foreach ($cates as $cate) : ?>
                        <?php extract($cate) ?>
                        <a class="text-gray-700 font-medium"
                            href="<?= $SITE_URL ?>/page/product.php?category_id=<?= $category_id ?>">
                            <li class="rounded py-2 px-2 hover:bg-gray-200">
                                <?= $category_name ?>
                            </li>
                        </a>


                        <?php endforeach; ?>

                    </ul>
                </div>

            </div>


            <div class="px-4">
                <div class="">
                    <div class="products__title text-center">
                        <p class="text-3xl font-medium text-orange-500 mt-5 ">
                            " Ăn đã – chuyện khác để sau "
                        </p>
                    </div>

                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 py-4">

                    <?php foreach ($items as $item) : ?>
                    <?php extract($item); ?>
                    <div style="
              background: rgba(255, 255, 255, 0.25);
              box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.20);
              backdrop-filter: blur(4px);
              -webkit-backdrop-filter: blur(4px);
              border-radius: 10px;
              border: 1px solid rgba(255, 255, 255, 0.18);" class="p-4 min-w-[170px]  rounded-2xl space-y-2">
                        <a class="mt-2" href="<?= $SITE_URL ?>/page/detail.php?product_id=<?= $product_id ?>">
                            <img class="rounded-xl min-w-[150px] h-[150px] lg:h-[180px] block mx-auto object-cover object-center"
                                src="<?= $CONTENT_URL ?>/images/products/<?= $image ?>" alt="" class="rounded">
                            <h2 class="truncate mt-3 font-medium"><?= $product_name ?></h2>
                            <p class="text-sm font-semibold flex justify-between items-center  text-orange-600 mt-2">
                                <span class="text-xs"> <?php
                                                            $avg = avg_feedbacks($product_id);
                                                            if ($avg == 0) {
                                                                echo "<span class='font-medium text-gray-500'>Chưa có đánh giá</span>";
                                                            } else if ($avg <= 1) {
                                                                echo "<span class='text-yellow-500'>★</span>";
                                                            } else if ($avg <= 2) {
                                                                echo "<span class='text-yellow-500'>★★</span>";
                                                            } else if ($avg <= 3) {
                                                                echo "<span class='text-yellow-500'>★★★</span>";
                                                            } else if ($avg <= 4) {
                                                                echo "<span class='text-yellow-500'>★★★★</span>";
                                                            } else if ($avg <= 5) {
                                                                echo "<span class='text-yellow-500'>★★★★★</span>";
                                                            }

                                                            ?></span>
                                <?= number_format($price * (1 - $discount / 100), 0, '', '.') ?>đ
                            </p>
                            <p class="leading-relaxed text-gray-700 mt-1 text-xs limited__content-2 h-10">
                                <?= $detail ?>
                            </p>
                        </a>
                        <form action="<?= $SITE_URL ?>/cart/index.php?btn_order" method="post">
                            <input type="hidden" name="product_id" value="<?= $product_id ?>">
                            <input type="hidden" name="image" value="<?= $image ?>">
                            <button class="btn__add w-full bg-orange-600 text-white px-2 py-2 rounded">
                                Thêm vào giỏ
                            </button>
                        </form>


                    </div>


                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <div class="py-14">
            <div class="text-center">
                <div class="inline-flex rounded-xl border border-[#e4e4e4] bg-white p-4">
                    <ul class="-mx-[6px] flex items-center">
                        <li class="px-[6px]">
                            <a href="javascript:void(0)"
                                class="hover:bg-primary hover:border-primary flex h-9 w-9 items-center justify-center rounded-md border border-[#EDEFF1] text-xs text-[#838995] hover:text-white">
                                Đầu
                            </a>
                        </li>
                        <li class="px-[6px] ">
                            <a href="javascript:void(0)"
                                class="hover:bg-primary hover:border-primary flex h-9 w-9 items-center justify-center rounded-md border border-[#EDEFF1] text-base text-[#838995] hover:text-white">
                                <span>
                                    <svg width="8" height="15" viewBox="0 0 8 15" class="fill-current stroke-current">
                                        <path
                                            d="M7.12979 1.91389L7.1299 1.914L7.1344 1.90875C7.31476 1.69833 7.31528 1.36878 7.1047 1.15819C7.01062 1.06412 6.86296 1.00488 6.73613 1.00488C6.57736 1.00488 6.4537 1.07206 6.34569 1.18007L6.34564 1.18001L6.34229 1.18358L0.830207 7.06752C0.830152 7.06757 0.830098 7.06763 0.830043 7.06769C0.402311 7.52078 0.406126 8.26524 0.827473 8.73615L0.827439 8.73618L0.829982 8.73889L6.34248 14.6014L6.34243 14.6014L6.34569 14.6047C6.546 14.805 6.88221 14.8491 7.1047 14.6266C7.30447 14.4268 7.34883 14.0918 7.12833 13.8693L1.62078 8.01209C1.55579 7.93114 1.56859 7.82519 1.61408 7.7797L1.61413 7.77975L1.61729 7.77639L7.12979 1.91389Z"
                                            stroke-width="0.3"></path>
                                    </svg>
                                </span>
                            </a>
                        </li>

                        <li class="px-[6px]">
                            <a href="javascript:void(0)"
                                class="hover:bg-primary hover:border-primary flex h-9 w-9 items-center justify-center rounded-md border border-[#EDEFF1] text-base text-[#838995] hover:text-white">
                                <span>
                                    <svg width="8" height="15" viewBox="0 0 8 15" class="fill-current stroke-current">
                                        <path
                                            d="M0.870212 13.0861L0.870097 13.086L0.865602 13.0912C0.685237 13.3017 0.684716 13.6312 0.895299 13.8418C0.989374 13.9359 1.13704 13.9951 1.26387 13.9951C1.42264 13.9951 1.5463 13.9279 1.65431 13.8199L1.65436 13.82L1.65771 13.8164L7.16979 7.93248C7.16985 7.93243 7.1699 7.93237 7.16996 7.93231C7.59769 7.47923 7.59387 6.73477 7.17253 6.26385L7.17256 6.26382L7.17002 6.26111L1.65752 0.398611L1.65757 0.398563L1.65431 0.395299C1.454 0.194997 1.11779 0.150934 0.895299 0.373424C0.695526 0.573197 0.651169 0.908167 0.871667 1.13067L6.37922 6.98791C6.4442 7.06886 6.43141 7.17481 6.38592 7.2203L6.38587 7.22025L6.38271 7.22361L0.870212 13.0861Z"
                                            stroke-width="0.3"></path>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="px-[6px]">
                            <a href="javascript:void(0)"
                                class="hover:bg-primary hover:border-primary flex h-9 w-9 items-center justify-center rounded-md border border-[#EDEFF1] text-xs text-[#838995] hover:text-white">
                                Cuối
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

    </section>

    <footer class="text-gray-700 pt-24 mx-auto">
        <section class="w-full grid gap-4 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 px-8 md:px-14 lg:px-20">
            <div class="footer__item-logo ml-5">
                <img class="h-16" src="../IMG/logo.png" alt="logo" />
                <p class="footer-item-title--desc mt-4 text-gray-500 text-sm max-w-[220px]">
                    Website được phát triển bởi đội ngũ sinh viên FPT Polytechnic.
                </p>
            </div>
            <div class="footer__item mb-5 ml-5">
                <h1 class="footer__item-title text-xl block mb-3 font-bold">
                    Liên hệ
                </h1>
                <ul class="footer__item-list mt-3">
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                            Giới thiệu
                        </a>
                    </li>
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                            Góp ý
                        </a>
                    </li>
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                            Tuyển dụng
                        </a>
                    </li>
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                            Điều khoản
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer__item mb-5 ml-5">
                <h1 class="footer__item-title text-xl block mb-3 font-bold">
                    Hỗ trợ
                </h1>
                <ul class="footer__item-list mt-3">
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                            Hướng dẫn mua hàng
                        </a>
                    </li>
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                            Hướng dẫn thanh toán
                        </a>
                    </li>
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                            Khiếu nại
                        </a>
                    </li>

                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                            FAQs
                        </a>
                    </li>
                </ul>
            </div>

            <div class="footer__item mb-5 ml-5">
                <h1 class="footer__item-title text-xl block mb-3 font-bold">
                    ĐỊA CHỈ
                </h1>
                <ul class="footer__item-list mt-3">
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                            Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phương, Nam Từ
                            Liêm, Hà Nội, Việt Nam
                        </a>
                    </li>
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                            https://caodang.fpt.edu.vn/
                        </a>
                    </li>
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                            098.172.5836
                        </a>
                    </li>
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                        </a>
                    </li>
                    <li class="footer__item-list-item">
                        <a href="#" class="footer__item-list-item-link block mb-3 text-sm text-gray-500">
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <div class="border-t border-gray-200">
            <div class="container px-5 py-8 flex flex-wrap mx-auto items-center">
                <form class="search__form flex md:flex-no-wrap flex-wrap justify-center md:justify-start"
                    action="./product.php" method="post">
                    <input name="keyword" style="box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37)"
                        class="sm:w-64 w-40 bg-gray-100 rounded sm:mr-4 mr-2 border focus:outline-none focus:border-orange-600 text-base py-2 px-4"
                        placeholder="Nhập tên món ăn..." type="text" />
                    <button name="search_product" style="box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37)"
                        class="inline-flex text-white bg-orange-600 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                        Tìm kiếm
                    </button>
                </form>
                <span class="inline-flex lg:ml-auto lg:mt-0 mt-6 w-full justify-center md:justify-start md:w-auto">
                    <a class="text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </a>
                    <a class="ml-3 text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-5 h-5" viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                            </path>
                        </svg>
                    </a>
                    <a class="ml-3 text-gray-500">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                    </a>
                    <a class="ml-3 text-gray-500">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                            <path stroke="none"
                                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                            </path>
                            <circle cx="4" cy="4" r="2" stroke="none"></circle>
                        </svg>
                    </a>
                </span>
            </div>
        </div>
        <div class="bg-gray-200">
            <div class="container mx-auto py-4 px-5 flex justify-center items-center sm:flex-row flex-col">
                <p class="text-gray-500 text-sm text-center sm:text-left">
                    © 2022 polyfood —
                    <a href="#" class="text-gray-600 ml-1" target="_blank" rel="noopener noreferrer">@fptpolytechnic</a>
                </p>
            </div>
        </div>
    </footer>