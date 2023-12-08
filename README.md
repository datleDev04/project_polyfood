# project_polyfood


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
                    <a href="index.php?url=allproduct">
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


        <form action="?url=product" method="POST" class="hidden md:block">
            <h1 class="text-3xl text-orange-500 font-medium">Danh mục</h1>
            <div style="
              background: rgba(255, 255, 255, 0.25);
              box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.23);
              backdrop-filter: blur(4px);
              -webkit-backdrop-filter: blur(4px);
              border-radius: 10px;
              border: 1px solid rgba(255, 255, 255, 0.18);" class="mt-5 p-3 bg-white">
                <ul class="space-y-2">
                    <button >
                        <li class="rounded py-2 px-2 text-gray-700 font-medium">Tất cả </li>
                    </button>

                    <?php foreach ($listall_category as $listone_category) : ?>
                        <?php extract($listone_category) ?>
                        <button name="btn_category" class="text-gray-700 font-medium >
                            <input type="hidden" name="category_id" value="<?= $category_id ?>">
                            <li class="w-[100px] rounded py-2 px-2 hover:bg-gray-200">
                                <?= $category_name ?>
                            </li>
                        </button>
                    <?php endforeach; ?>

                </ul>
            </div>

        </form>