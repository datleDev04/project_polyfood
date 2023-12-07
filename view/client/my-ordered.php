<div class="title__list-order mt-5 mb-3">
        <h1 class="text-center text-3xl font-bold text-gray-700">
            Đơn hàng của tôi
        </h1>
    </div>
    <main style="border-radius: 10px; background: #fff; " class="w-full  px-20  bg-gray-100">
        <div class="list__product__orded flex flex-col gap-3 items-center justify-center">
            <!-- Đặt vòng for từ đây -->
            <?php foreach ($order as $item) { ?>
            <!-- Khối chứa thông tin sản phẩm -->
            <?php extract($item);
                $total = $price * $quantity; ?>
            <form class="all__my__cart " action="?url=my_ordered" method="post">
                <div class="flex sm:flex-row flex-col my-5 gap-3 p-4 border-b-[3px] relative">
                    <div class="order__id bg-orange-500 px-2 py-1 h-8 rounded-full absolute top-o left-0 z-50">
                        <!-- Mã đơn hàng -->
                        <h1 class="whitespace-nowrap font-bold text-white ">
                            #<?= $order_id ?>
                        </h1>
                    </div>
                    <div
                        class="list__product__orded-item max-h-[240px] overflow-x-scroll flex flex-col   w-full gap-5 p-5 rounded-lg border-[3px] border-dashed">
                        <!-- 1 sản phẩm -->
                        <div style="
    background: rgba(255, 255, 255, 0.8);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(2.5px);
    -webkit-backdrop-filter: blur(2.5px);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.18);
  " class="list__product__orded__item__product min-w-[305px] p-2 max-h-[115px] flex gap-5">
                            <div class="product__img">
                                <img style="width: 100px; height: 100px;" class="rounded-lg object-cover object-center"
                                    src="src/assets/images/products/<?= $image ?>" alt="" />
                            </div>
                            <div class="product__info flex flex-col gap-1">
                                <h1 class="text-xl font-semibold text-gray-700">
                                    <?= $product_name ?>
                                </h1>
                                <p class="text-gray-600 text-xs">Số lượng : <?= $quantity ?></p>
                                <p class="text-gray-600 text-xs">Ngày đặt : <?= $time_order ?></p>
                                <p class="text-gray-600 text-xs">Đơn giá :
                                    <?= number_format($price, 0, ".", ".") ?>đ</p>
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- Khối chứa thông tin khách hàng -->
                    <div class="list__porduct__orded__item__user  rounded-lg p-5 border-[3px] border-dashed">
                        <div class="list__porduct__orded__item__user__info flex gap-5">
                            <div class="user__info">
                                <h1 class="text-xl font-semibold text-gray-700 whitespace-nowrap">Thông tin người nhận
                                </h1>
                                <p class="text-gray-600 text-sm font-bold">
                                    Họ tên : <span class="font-normal">
                                        <?= $name ?>
                                    </span>
                                </p>
                                <p class="text-gray-600 text-sm font-bold">
                                    Số điện thoại : <span class="font-normal">
                                        <?= $phone ?>
                                    </span>
                                </p>
                                <p class="text-gray-600 text-sm font-bold">
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <span class="font-bold">Ghi chú : </span>
                                    <?= $note ?>
                                </p>
                            </div>
                        </div>
                        <div class="list__porduct__orded__item__user__status flex flex-col">
                            <div class="user__status flex items-center gap-1">
                                <h1 class="font-bold text-sm text-gray-600">Trạng thái : </h1>
                                <p class="text-yellow-500 text-xs">
                                    <?php if ($status == 0) {
                                            echo "Đang chờ xử lý";
                                        } else if ($status == 1) {
                                            echo "Đang giao hàng";
                                        } else if ($status == 2) {
                                            echo "Đã giao hàng";
                                        } else if ($status == 3) {
                                            echo "Đã hủy";
                                        } ?>
                                </p>
                            </div>
                            <div class="user__status flex items-center gap-1">
                                <h1 class="font-bold text-sm text-gray-600">Tổng tiền : </h1>
                                <p class="text-orange-500 text-sm">
                                    <?= number_format($total, 0, ".", ".") ?>đ
                                </p>
                            </div>
                        </div>
                        <!-- 2 nút xác nhận và hủy -->
                        
                        <div class="list__porduct__orded__item__user-check mt-2 flex justify-center items-center gap-2">
                            <?php if ($status == 1) {?>
                            <a href="?url=my_ordered&confirm_order=<?=$order_id?>"  name="confirm_order"
                                class="whitespace-nowrap bg-green-500 text-white text-sm font-semibold px-3 py-2 rounded-lg">
                                Nhận hàng
                            </a>
                            <?php }?>
                            <?php if ($status == 0) {?>

                            <a href="?url=my_ordered&cancel_order=<?= $order_id ?>" name="cancel_order"
                                class="whitespace-nowrap bg-red-500 text-white text-sm font-semibold px-3 py-2 rounded-lg">
                                Hủy đơn
                            </a>
                            <?php }?>
                            <?php if ($status == 2) {?>

                            <a href="?url=detail_product&product_id=<?= $product_id ?>" name="cancel_order"
                                class="whitespace-nowrap bg-red-500 text-white text-sm font-semibold px-3 py-2 rounded-lg">
                                Đánh giá sản phẩm
                            </a>
                            <?php }?>

                            <!-- Nếu nút confim được submit thì hiển thị nút đánh giá -->
                        </div>
                    
                    </div>
                </div>
            </form>
            <?php } ?>
            <hr>


        </div>
    </main>