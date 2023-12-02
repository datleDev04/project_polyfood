<?php
$items = loadall_category();
$productall = loadallproduct();
?>
<main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
        <?php
    if (strlen($MESSAGE)) {
      echo "<h5>$MESSAGE</h5>";
    }
    ?>
        <section class="add__category w-full mt-5">
            <section class="add__products-title flex  items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h1 class="text-left lg:text-xl text-gray-500 uppercase">Thêm sản phẩm</h1>
            </section>

            <section class="mt-5  w-full">
                <form action="index.php?url=add_product" class="form__add-category w-full" method="post" enctype="multipart/form-data">
                    <div class="list__form-group w-full grid  grid-cols-2 gap-5">
                        <div class="form__group flex flex-col">
                            <label for="categorytid"
                                class="text-gray-500 text-xs sm:text-sm md:text-base lg:text-base">Mã sản phẩm</label>
                            <input placeholder="Auto" disabled type="text" name="product_id" id="product__id" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none
text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3
rounded-md text-gray-500
" />
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500"
                                for="product_name">Tên sản phẩm</label>
                            <input type="text"
                                class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 "
                                name="product_name" id="product_name" placeholder="Nhập tên sản phẩm..."
                                value="<?= $product_name ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['product_name']) ? $error['product_name'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Danh
                                mục</label>

                            <select name="category_id"
                                class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm  bg-gray-100 rounded-md text-gray-500">
                                <option value="0">Chọn danh mục</option>
                                <?php foreach ($items as $item) : ?>
                                <?php extract($item) ?>
                                <option value="<?= $category_id ?>"><?= $category_name ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500"
                                for="name">Giá</label>
                            <input type="number"
                                class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 "
                                name="price" id="name" placeholder="Giá..." value="<?= $price ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['price']) ? $error['price'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Giảm
                                giá</label>
                            <input type="number"
                                class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 "
                                name="discount" id="name" placeholder="Giảm giá...%" value="<?= $discount ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['discount']) ? $error['discount'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="quantity">Số
                                lượng</label>
                            <input type="number" min="0"
                                class="form__input-add__prodcut mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500"
                                name="quantity" id="quantity" placeholder="Nhập số lượng.." value="<?= $quantity ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['quantity']) ? $error['quantity'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Ảnh sản
                                phẩm</label>
                            <input type="file"
                                class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 "
                                name="image" id="name" />
                        </div>
                    </div>
                    <div class="form__group flex flex-col">
                        <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="detail">Mô
                            tả</label>
                        <textarea cols="30" rows="10" name="detail" id="detail"
                            class="mt-2 p-2 px-3   shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md  text-gray-500"> <?php if (isset($detail) && $detail != "") {
                            echo $detail;
                           } ?></textarea>
                        <span class="text-red-500 text-xs">
                            <?= isset($error['detail']) ? $error['detail'] : ''; ?>
                        </span>
                    </div>
                    <div class="form__add-category--list-button w-full mt-7 flex gap-3 justify-center items-center">
                        <button type="submit" name="add" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                            Thêm mới
                        </button>
                        <button type="reset" name="reset" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                            Nhập lại
                        </button>
                        <a href="?url=product" name="btn_list" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                            Danh sách
                        </a>
                    </div>
                </form>
            </section>
        </section>
        <!-- End add_product -->
    </main>