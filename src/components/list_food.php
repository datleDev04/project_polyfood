<section id="category" class="text-gray-700 border-t border-gray-200">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col w-full mb-20 text-center">
            <h1 class="mb-4 text-2xl font-medium text-gray-900 sm:text-3xl title-font">
                Danh mục
            </h1>
            <p class="mx-auto text-base leading-relaxed lg:w-2/3">
                Chúng ta có gì ?
            </p>
        </div>
        <div class="flex flex-wrap -m-2">

            <?php foreach($list_categories as $categories) {
                $img = "src/assets/images/categories/".$categories['category_image'];
                echo '
                <div class="w-full p-2 lg:w-1/3 md:w-1/2 cursor-pointer">
                <a href="?url=product&category_id='.$categories['category_id'].'">
                        <div class="flex items-center h-full p-4 border border-gray-200 rounded-lg">
                        <img alt="team" class="flex-shrink-0 object-cover object-center w-16 h-16 mr-4" src="'.$img.'" />
                    <div class="flex-grow">
                    <h2 class="font-medium text-gray-900 title-font">'.$categories['category_name'].'</h2>
                    <p class="text-xs text-gray-500">
                        '.$categories['suggest'].'
                    </p>
                    </div>
                        </div>
                </a>
                </div>  
                ';

            }
            
            ?>


        </div>
    </div>
</section>



