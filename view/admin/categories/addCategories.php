
                <main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
                    <?php
                    
                    if (strlen($MESSAGE)) {
                        echo "<h5>$MESSAGE</h5>";
                    }
                    ?>
                    <section class="add__category w-full mt-5">
                        <section class="add__products-title flex  items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h1 class="text-left lg:text-xl text-gray-500 uppercase">Thêm danh mục</h1>
                        </section>

                        <section class="mt-5  w-full">
                            <form action="?url=adddm" class="form__add-category w-full" method="post" enctype="multipart/form-data">
                                <div class="list__form-group w-full grid  grid-cols-2 gap-5">
                                    <div class="form__group flex flex-col">
                                        <label for="category_id" class="text-gray-500 text-xs sm:text-sm md:text-base lg:text-base">Mã sản phẩm</label>
                                        <input placeholder="Auto" disabled type="text" name="category_id" id="category__id" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none
text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3
rounded-md text-gray-500
" />
                                    </div>
                                    <div class="form__group flex flex-col ">
                                        <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Tên
                                            danh mục</label>
                                        <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="category_name" id="name" placeholder="Nhập tên danh mục..." value="<?= $category_name ?>" />
                                        <span class="text-red-500 text-xs">
                                            <?= isset($error['category_name']) ? $error['category_name'] : ''; ?>
                                        </span>
                                    </div>
                                    <div class="form__group flex flex-col ">
                                        <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Ảnh
                                            minh họa</label>
                                        <input type="file" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="category_image" id="name" />
                                    </div>
                                    <div class="form__group flex flex-col ">
                                        <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Gợi
                                            ý</label>
                                        <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="suggest" id="name" placeholder="Nhập gợi ý..." value="<?= $suggest ?>" />
                                        <span class="text-red-500 text-xs">
                                            <?= isset($error['suggest']) ? $error['suggest'] : ''; ?>
                                        </span>
                                    </div>

                                </div>
                                <div class="form__add-category--list-button w-full mt-7 flex gap-3 justify-center items-center">
                                    <button name="btn_insert" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                                        Thêm mới
                                    </button>
                                    <button type="reset" name="reset" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                                        Nhập lại
                                    </button>
                                    <a href="?url=listdm" type="submit" name="listdm" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
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
