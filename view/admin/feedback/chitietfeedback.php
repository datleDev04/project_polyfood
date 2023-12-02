<?php
$items = info_feedback($product_id);
?>

<main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
        <section class="list__accounts w-full">
            <section class="list__accounts-title  flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-10 h-10 text-gray-500">
                    <path fill-rule="evenodd"
                        d="M2.625 6.75a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0A.75.75 0 018.25 6h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75zM2.625 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12A.75.75 0 017.5 12zm-4.875 5.25a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75z"
                        clip-rule="evenodd" />
                </svg>

                <h1 class="text-left text-xl text-gray-500 uppercase">
                    Chi tiết phản hồi
                </h1>
            </section>
            <h3 class="font-medium text-sm text-indigo-500 my-5">Mã sản phẩm : <?= $items[0]['product_id'] ?></h3>
            <div class="list__accounts-table w-full mt-4">
                <table class="w-full text-center rounded-md shadow-md my-3">
                    <thead class="boder bg-gray-200 px-2 rounded-t-md">
                        <tr>
                            <th class=" text-xs  p-2 w-32 font-medium">
                                Nội dung
                            </th>
                            <th class=" text-xs  p-2 font-medium">
                                Đánh giá
                            </th>
                            <th class=" text-xs  p-2  font-medium">
                                Hình ảnh
                            </th>
                            <th class=" text-xs  px-6 py-2 font-medium">
                                Ngày đăng
                            </th>
                            <th class=" text-xs  px-2 py-2 font-medium">
                                Người đăng
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
            foreach ($items as $item) {
              extract($item);
            ?>
                        <tr class="border-t-2 border-dashed">
                            <td class="p-2 whitespace-nowrap">
                                <p class="text-xs  text-gray-900 ">
                                    <?= $content ?>
                                </p>
                            </td>
                            <td class="p-2 w-20 ">
                                <p class="text-xs text-gray-900 ">
                                    <?= $rate ?>
                                </p>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                               <?php if(!empty($image)){ ?>
                                <img class="rounded-md object-cover object-center block mx-auto"
                                    src="<?= $CONTENT_URL ?>/images/feedbacks/<?= $image ?>" width="60" height="60"
                                    alt="">
                                <?php }else {?>
                                    <p class="text-xs text-gray-900 ">No image feedback</p>
                                    <?php } ?>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <p class="text-xs text-gray-900">
                                    <?= $time_send ?>
                                </p>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <p class="text-xs text-gray-900">
                                    <?= $user_name ?>
                                </p>
                            </td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="list__accounts-table--button w-full px-5 mt-7 flex justify-center gap-5">
                <a href="index.php?url=feedback" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow:
1.5px 1.5px 2.5px #babecc, -2px -2px 5px #fff;"
                    class=" p-3  border rounded-md  text-center   text-xs hover:bg-gray-200 leading-4 ">
                    Danh sách phản hồi
                </a>
            </div>
        </section>
    </main>