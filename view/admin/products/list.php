<main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full p-5 mt-5 bg-gray-100">
    <section class="w-full list__accounts">
        <section class="flex items-center gap-2 list__accounts-title">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-gray-500">
                <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0A.75.75 0 018.25 6h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75zM2.625 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12A.75.75 0 017.5 12zm-4.875 5.25a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
            </svg>

            <h1 class="text-xl text-left text-gray-500 uppercase">
                Tất cả sản phẩm
            </h1>
            <a href="index.php?url=add_product"style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow:
1.5px 1.5px 2.5px #babecc, -2px -2px 5px #fff;" class="ml-[600px] p-2  border rounded-md w-[120px] text-center   text-xs hover:bg-gray-200 leading-4 ">
                    Thêm mới
                </a>
            <a href="index.php?url=recover_product"style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow:
1.5px 1.5px 2.5px #babecc, -2px -2px 5px #fff;" class=" p-2  border rounded-md w-[120px] text-center   text-xs hover:bg-gray-200 leading-4 ">
                    Khôi phục 
                </a>
        </section>
        <form action="index.php?action=deleteSelectedCategory" method="post">
            <div class="w-full mt-4 list__accounts-table">
                <table class="w-full mx-auto text-center rounded-md shadow-md my-3">
                    <thead class="px-2 bg-gray-200 boder rounded-t-md">
                        <tr>
                           
                            <th class="p-2 text-xs font-medium ">
                                ID
                            </th>
                            <th class="px-2 py-2 text-xs font-medium whitespace-nowrap">
                                Sản phẩm
                            </th>
                            <th class="px-2 py-2 text-xs font-medium whitespace-nowrap">
                                Loại
                            </th>
                            <th class="px-2 py-2 text-xs font-medium whitespace-nowrap">
                                Giá
                            </th>
                            <th class="px-2 py-2 text-xs font-medium whitespace-nowrap">
                                Giảm giá
                            </th>
                            <th class="px-2 py-2 text-xs font-medium whitespace-nowrap">
                                Số lượng
                            </th>
                            <th class="px-2 py-2 text-xs font-medium whitespace-nowrap">
                                Hình ảnh
                            </th>
                            <th class="px-2 py-2 text-xs font-medium whitespace-nowrap">
                                Chi tiết
                            </th>
                            <th class="px-2 py-2 text-xs font-medium ">
                                View
                            </th>
                            <th class="px-6 py-2 text-xs font-medium whitespace-nowrap">
                                Thao tác
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) : ?>
                            <?php extract($item);
                            $img = "../../src/assets/images/products/" . $image;
                            ?>
                            <tr class="border-t-2 border-dashed">
                                

                                <td class="p-2 ">
                                    <p class="text-xs text-gray-900">
                                        <?= $product_id ?>
                                    </p>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <p class="text-xs text-gray-900">
                                        <?= $product_name ?>
                                    </p>
                                </td>

                                <td class="p-2 whitespace-nowrap">
                                    <p class="text-xs text-gray-900">
                                        <?= $category_name ?>
                                    </p>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <p class="text-xs text-gray-900">
                                        <?= number_format($price, 0, ',', '.') ?>đ
                                    </p>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <p class="text-xs text-gray-900">
                                        <?= $discount ?>%
                                    </p>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <p class="text-xs text-gray-900">
                                        <?= $quantity ?>
                                    </p>
                                </td>
                                <td class="p-2 whitespace-nowrap">

                                    <img class="rounded-lg object-cover object-center" src="<?= $img ?>" width="100" height="100" alt="">
                                </td>
                                <td class="px-2 pt-2 w-52 limited__content-4">
                                    <p class="text-xs text-gray-900">
                                        <?= $detail ?>
                                    </p>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <p class="text-xs text-gray-900">
                                        <?= $view ?>
                                    </p>
                                </td>
                                <td class="px-2 whitespace-nowrap">
                                    <div class="flex gap-3 box__action justify-center">
                                        <a href="index.php?url=update&product_id=<?= $product_id ?>" class="text-indigo-600 hover:text-indigo-900"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>
                                        <a href="index.php?url=xoa_product&product_id=<?= $product_id ?>" class="text-indigo-600 hover:text-indigo-900"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            
        </form>
    </section>
</main>
</article>
</div>
</div>
</body>