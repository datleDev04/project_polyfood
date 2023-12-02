<article class="w-[85%]">
    <header style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px #bebebe,
-35px -35px 70px #ffffff;
" class="w-full h-[60px] flex items-center justify-between px-5 py-2">
        <div class="logo-[100px] h-auto px-2 flex gap-2 items-center justify-center">
            <a class="flex font title-font font-medium items-center mb-4 md:mb-0" href="../../index.php" >
                <span class="text-orange-600">poly</span><span class="text-blue-600 font-semibold">F</span><span class="text-orange-600 font-semibold">oo</span><span class="text-green-600 font-semibold">d</span>
            </a>


        </div>
        <div class="account__admin flex items-center gap-2">
            <div class="account__admin--avatar">

                <img src="../../src/assets/images/users/<?= $_SESSION['user']['image'] ?>" alt=""
                    class="w-10 h-10 rounded-full" />
            </div>
            <div class="account__admin--name flex flex-col gap-1">
                <p class="font-medium text-sm text-gray-500">
                <?= $_SESSION['user']['name'] ?>
                </p>
                <a href="index.php?action=logout" class="logout text-xs text-gray-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    Logout
                </a>
            </div>
        </div>
    </header>
    <!-- End header -->