<?php
require_once 'view/client/detail_product.php';
?>

<?php foreach ($product_cungloai as $product_cungloai) {
    extract($product_cungloai);
}?>
    <form action="" method="post">
        <!-- <input type="hidden" value="<?= $product_id ?>" id="product_id" name="product_id">
        <input type="hidden" value="<?= $image ?>" value="image" id="image" name="image">
        <input type="hidden" value="<?= $price ?>" value="price" id="price" name="price"> -->

        <div class="p-4 shadow__products  rounded-2xl bg-white space-y-2">
            <a href="index.php?url=detail_product&product_id=<?=$product_id?>"><img class="block mx-auto min-w-[150px] h-[150px] lg:h-[180px] object-cover object-contain" src="<?= $hinh ?>" alt=""> </a>
            <h2 class=" space-y-2"><?= $product_name ?></h2>
            <p class="text-xs font-semibold flex justify-between  text-red-500 mt-2">
                <span class="text-sm text-red-600">★★★★★</span><?= number_format($price * (1 - $discount / 100), 0, '', '.') ?>đ
            </p>
            <p class="leading-relaxed text-xs limited__content-2 h-10">
                <?= $detail ?>
            </p>
            <button class="btn__add w-full bg-orange-600 text-white px-2 py-2 rounded">
                Thêm vào giỏ

            </button>
        </div>
    </form>
<?php
