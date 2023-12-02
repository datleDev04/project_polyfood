<?php extract($item)?>
<?php $cate_id = $category_id;
$cates = loadall_category();
?>
<main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
<?php
    if (strlen($MESSAGE)) {
      echo "<h5>$MESSAGE</h5>";
    }
    ?>
    <section class="add__category w-full mt-5">
        <section class="add__products-title flex  items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>

            <h1 class="text-left lg:text-xl font-medium text-gray-500 uppercase">Cật nhật sản phẩm</h1>
        </section>

        <section class="mt-5  w-full">
            <form action="index.php?url=update&product_id=<?=$product_id?>" class="form__add-category w-full" method="post" enctype="multipart/form-data">
                <div class="list__form-group w-full grid  grid-cols-2 gap-5">
                    <div class="form__group flex flex-col">
                        <label for="categorytid" class="text-gray-500 text-xs sm:text-sm md:text-base lg:text-base" >
                            Mã sản phẩm
                        </label>
                        <input value="<?= $product_id ?>" readonly type="text" name="product_id" id="product__id" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none
text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3
rounded-md text-gray-500
" />
                    </div>
                    <div class="form__group flex flex-col ">
                        <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">
                            Tên sản phẩm
                        </label>
                        <input type="text" value="<?=$product_name ?>" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="product_name" id="name" placeholder="Product name" />
                        <span class="text-red-500 text-xs">
                            <?= isset($error['product_name']) ? $error['product_name'] : ''; ?>
                        </span>
                    </div>
                    <div class="form__group flex flex-col ">
                        <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name" >
                            Danh mục</label>

                        <select name="category_id"
                                class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm  bg-gray-100 rounded-md text-gray-500">
                                <?php foreach ($cates as $cate) : ?>
                                <?php extract($cate) ?>
                                <option value="<?= $category_id ?>" <?= $cate_id == $category_id ? "selected" : "" ?>>
                                    <?= $category_name ?></option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                
                    <div class="form__group flex flex-col ">
                        <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Giá</label>
                        <input type="number" value="<?= $price ?>" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="price" id="name" placeholder="Price" />
                        <span class="text-red-500 text-xs">
                            <?= isset($error['price']) ? $error['price'] : ''; ?>
                        </span>
                    </div>
                    <div class="form__group flex flex-col ">
                        <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Sale</label>
                        <input type="number" value="<?= $discount ?>" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="discount" id="name" placeholder="Discount" />
                        <span class="text-red-500 text-xs">
                            <?= isset($error['discount']) ? $error['discount'] : ''; ?>
                        </span>
                    </div>
                    <div class="form__group flex flex-col">
                        <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="quantity">Số
                            lượng</label>
                        <input type="number" value="<?= $quantity ?>" min="0" class="form__input-add__prodcut mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md text-gray-500" name="quantity" id="quantity" placeholder="Quantity" />
                        <span class="text-red-500 text-xs">
                            <?= isset($error['quantity']) ? $error['quantity'] : ''; ?>
                        </span>
                    </div>
                    <div class="form__group flex flex-col ">
                        <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Ảnh sản
                            phẩm</label>
                        <input type="hidden" name="image" value="<?= $image ?>" id="image" class="form__input-edit__prodcut shadow-2xl border border-gray-200 focus:outline-none
text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3
rounded-md text-gray-500
" />
                        <input type="file" name="upload_image" id="upload_image" class="form__input-edit__prodcut shadow-2xl border border-gray-200 focus:outline-none
text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3
rounded-md text-gray-500
" /> (<?= $image ?>)
                    </div>

                </div>
                </ <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="detail">
                <div class="form__group flex flex-col w-full">
                    <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500 uppercase">
                        Mô tả
                    </label>
                    <textarea cols="30" rows="10" name="detail" id="detail" class="mt-2 p-2 px-3 w-full  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 rounded-md  text-gray-500"><?= trim($detail) ?></textarea>
                    <span class="text-red-500 text-xs">
                        <?= isset($error['detail']) ? $error['detail'] : ''; ?>
                    </span>
                </div>
                <div class="form__add-category--list-button w-full mt-7 flex gap-3 justify-center items-center">
                    <button type="submit" name="update" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                        Cập nhật
                    </button>
                    <button style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow:
1.5px 1.5px 2.5px #babecc, -2px -2px 5px #fff;" class="p-2  border rounded-md w-[120px] text-center   text-xs hover:bg-gray-200 leading-4 ">
                        <a href="index.php?url=add_product">Thêm mới</a>
                    </button>
                    <button type="submit" name="btn_list" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                        <a href="">Danh sách</a>
                    </button>
                </div>
            </form>
        </section>
    </section>
    <!-- End add_product -->
</main>