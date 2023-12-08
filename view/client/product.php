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
                    <a href="index.php?url=product">
                        <li class="rounded py-2 px-2 text-gray-700 font-medium">Tất cả </li>
                    </a>

                    <?php foreach ($listall_category as $listone_category) : ?>
                        <?php extract($listone_category) ?>
                        <?php $linkdm = "index.php?url=product&category_id=" . $category_id ?>
                        <a class="text-gray-700 font-medium" href="<?= $linkdm ?>">
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
                    <p class="text-4xl font-medium text-orange-500  mb-3">
                        " Ăn đã – chuyện khác để sau "
                    </p>
                </div>

            </div>

            
                <form action="?url=product&filter" method="POST" class="flex justify-end ">     

    <div>
        <select name="typeFilter" id="typeFilter" class="ml-2 float-right p-2 border rounded border-gray-300 w-[200px]"">
            <option class="py-3" value="" >Tất Cả</option>
            <option class="py-2" value="low" >Giá Thấp</option>
            <option class="py-2" value="high" >Giá Cao</option>
            <option class="py-2" value="popular" >Xem nhiều</option>
            <option class="py-2" value="least" >Xem ít</option>
        </select>
    </div>
    <button type="submit" value="Apply Filters" class="ml-2 p-2 w-[100px] bg-orange-600 text-white rounded">Lọc</button>
</form>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 py-4 pt-0">

                <?php foreach ($listall_product as $listall_product) : ?>
                    <?php extract($listall_product); ?>
                    <?php
                    $hinh = $img_path . $image;
                    ?>
                    <div style="
              background: rgba(255, 255, 255, 0.25);
              box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.20);
              backdrop-filter: blur(4px);
              -webkit-backdrop-filter: blur(4px);
              border-radius: 10px;
              border: 1px solid rgba(255, 255, 255, 0.18);" class="p-4 min-w-[170px]  rounded-2xl space-y-2">
                        <a class="mt-2" href="index.php?url=detail_product&product_id=<?=$product_id?>">
                            <img class="rounded-xl min-w-[150px] h-[150px] lg:h-[180px] block mx-auto object-cover object-center" src="<?= $hinh ?>" alt="" class="rounded">
                            <h2 class="truncate mt-3 font-bold text-xl"><?= $product_name ?></h2>
                            <h1 class="text-sm font-semibold flex justify-between items-center  text-orange-600 mt-2">
                                <span class="text-center text-xl">
                                    <?= number_format($price, 0, ",", ".") ?>đ
                                     </span>
                            </h1>
                            <p class="leading-relaxed text-gray-700 mt-1 text-xs limited__content-2 ">
                               ( <?= $view ?>  lượt xem)
                            </p>
                            <p class="leading-relaxed text-gray-700 mt-1 text-xs limited__content-2 h-10">
                                <?= $detail ?>
                            </p>
                        </a>
                        <form action="?url=cart&addToCart" method="post">
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
                        <a href="javascript:void(0)" class="hover:bg-primary hover:border-primary flex h-9 w-9 items-center justify-center rounded-md border border-[#EDEFF1] text-xs text-[#838995] hover:text-white">
                            Đầu
                        </a>
                    </li>
                    <li class="px-[6px] ">
                        <a href="javascript:void(0)" class="hover:bg-primary hover:border-primary flex h-9 w-9 items-center justify-center rounded-md border border-[#EDEFF1] text-base text-[#838995] hover:text-white">
                            <span>
                                <svg width="8" height="15" viewBox="0 0 8 15" class="fill-current stroke-current">
                                    <path d="M7.12979 1.91389L7.1299 1.914L7.1344 1.90875C7.31476 1.69833 7.31528 1.36878 7.1047 1.15819C7.01062 1.06412 6.86296 1.00488 6.73613 1.00488C6.57736 1.00488 6.4537 1.07206 6.34569 1.18007L6.34564 1.18001L6.34229 1.18358L0.830207 7.06752C0.830152 7.06757 0.830098 7.06763 0.830043 7.06769C0.402311 7.52078 0.406126 8.26524 0.827473 8.73615L0.827439 8.73618L0.829982 8.73889L6.34248 14.6014L6.34243 14.6014L6.34569 14.6047C6.546 14.805 6.88221 14.8491 7.1047 14.6266C7.30447 14.4268 7.34883 14.0918 7.12833 13.8693L1.62078 8.01209C1.55579 7.93114 1.56859 7.82519 1.61408 7.7797L1.61413 7.77975L1.61729 7.77639L7.12979 1.91389Z" stroke-width="0.3"></path>
                                </svg>
                            </span>
                        </a>
                    </li>

                    <li class="px-[6px]">
                        <a href="javascript:void(0)" class="hover:bg-primary hover:border-primary flex h-9 w-9 items-center justify-center rounded-md border border-[#EDEFF1] text-base text-[#838995] hover:text-white">
                            <span>
                                <svg width="8" height="15" viewBox="0 0 8 15" class="fill-current stroke-current">
                                    <path d="M0.870212 13.0861L0.870097 13.086L0.865602 13.0912C0.685237 13.3017 0.684716 13.6312 0.895299 13.8418C0.989374 13.9359 1.13704 13.9951 1.26387 13.9951C1.42264 13.9951 1.5463 13.9279 1.65431 13.8199L1.65436 13.82L1.65771 13.8164L7.16979 7.93248C7.16985 7.93243 7.1699 7.93237 7.16996 7.93231C7.59769 7.47923 7.59387 6.73477 7.17253 6.26385L7.17256 6.26382L7.17002 6.26111L1.65752 0.398611L1.65757 0.398563L1.65431 0.395299C1.454 0.194997 1.11779 0.150934 0.895299 0.373424C0.695526 0.573197 0.651169 0.908167 0.871667 1.13067L6.37922 6.98791C6.4442 7.06886 6.43141 7.17481 6.38592 7.2203L6.38587 7.22025L6.38271 7.22361L0.870212 13.0861Z" stroke-width="0.3"></path>
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="px-[6px]">
                        <a href="javascript:void(0)" class="hover:bg-primary hover:border-primary flex h-9 w-9 items-center justify-center rounded-md border border-[#EDEFF1] text-xs text-[#838995] hover:text-white">
                            Cuối
                        </a>
                    </li>
                </ul>
            </div>
        </div>

</section>
<!-- <a style="box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37)" id="cart" href="<?= $SITE_URL ?>/cart/index.php?my-cart.php" class="rounded-full w-16 h-16 sm:w-20 sm:h-20 bg-orange-600 animate-bounce fixed bottom-8 right-0 flex items-center z-50 justify-center text-gray-800 mr-8 mb-8 shadow-sm border-gray-300 border" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 text-white">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
    </svg>
</a> -->
<nav style="
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(2.5px);
        -webkit-backdrop-filter: blur(2.5px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.18);
      " class="menu__mobile lg:hidden fixed bottom-0 left-0 right-0 p-3 z-40 text-gray-400">
    <ul class="flex justify-center items-center gap-6 sm:gap-8">
        <li>
            <a href="<?= $SITE_URL ?>/layout.php">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 sm:w-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </a>
        </li>
        <li>
            <a href="<?= $SITE_URL ?>/page/introduce.php">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 sm:w-11">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                </svg>
            </a>
        </li>
        <li>
            <a href="<?= $SITE_URL ?>/page/product.php">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 sm:w-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
            </a>
        </li>
        <li>
            <a href="<?= $SITE_URL ?>/post/index.php">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 sm:w-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                </svg>
            </a>
        </li>
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 sm:w-11">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        </li>
    </ul>
</nav>
</body>

</html>