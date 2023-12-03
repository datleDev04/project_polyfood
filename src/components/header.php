<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PolyFood</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="src/css/base.css">
    <link rel="stylesheet" href="src/css/index.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="src/Javascript/main.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

</head>

<body class="font-montserrat min-w-[170px]">
    <header class="sticky top-0 z-50 hidden text-gray-700 bg-white border-b border-gray-200 lg:block">
        <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">
            <a class="flex font title-font font-medium items-center mb-4 md:mb-0" href="?url=trangchu" >
                <span class="text-orange-600">poly</span><span class="text-blue-600 font-semibold">F</span><span class="text-orange-600 font-semibold">oo</span><span class="text-green-600 font-semibold">d</span>
            </a>
            <!-- SEACHING BAR  -->
            <form action="?url=search" method="POST"  class=" relative mx-auto text-gray-600 ">
                                <input class="border-2 border-gray-300 ml-20 bg-white w-[400px] h-10 px-5 pr-16 rounded-2xl text-sm focus:outline-none"
                                type="text" name="search" placeholder="Search">
                                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                                <svg class="text-gray-600 h-4 w-4 fill-current " xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                    width="512px" height="512px">
                                    <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>
                                </button>
                            </form>
            <!-- END SEARCHING BAR  -->
            <nav class="flex flex-wrap items-center justify-center text-base md:ml-auto">
                <ul class="flex w-full justify-between gap-6 text-sm uppercase menu">
                    <li><a class="font-bold text-[16px] hover:text-orange-700" href="?url=product">Sản Phẩm</a></li>
                    <li><a class="font-bold text-[16px] hover:text-orange-700" href="?url=cart">Giỏ hàng</a></li>
                    <li><a class="font-bold text-[16px] hover:text-orange-700" href="?url=my_ordered">Đơn hàng của tôi</a></li>
                        
                        
                        <div class="relative inline-block text-left group">
                            <div>
                                <button type="button" id="menu-drop" aria-expanded="true" aria-haspopup="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        id="setting">
                                        <path fill="#200E32"
                                            d="M10.2143,0.0004 C10.7643,-0.0096 11.2853,0.1894 11.6743,0.5704 C12.0653,0.9394 12.2743,1.4504 12.2743,1.9904 C12.2743,3.0904 13.1843,3.9814 14.3153,3.9814 C14.6643,3.9814 15.0143,3.8804 15.3253,3.7104 C16.2943,3.1894 17.5043,3.5204 18.0543,4.4504 L18.0543,4.4504 L18.7353,5.6204 C18.9053,5.9204 19.0043,6.2604 19.0043,6.6104 C19.0043,7.3204 18.6153,7.9814 17.9853,8.3304 C17.6743,8.5004 17.4143,8.7604 17.2353,9.0614 C16.7043,10.0004 17.0353,11.1894 17.9853,11.7314 C18.9443,12.2804 19.2743,13.4814 18.7353,14.4304 L18.7353,14.4304 L18.0543,15.5614 C17.6943,16.1804 17.0243,16.5614 16.3043,16.5614 C15.9443,16.5614 15.5843,16.4704 15.2853,16.2904 C14.9643,16.1204 14.6153,16.0204 14.2643,16.0204 C13.7243,16.0204 13.2043,16.2314 12.8253,16.6104 C12.4343,16.9814 12.2243,17.4904 12.2243,18.0204 C12.2243,19.1104 11.3153,20.0004 10.1843,20.0004 L10.1843,20.0004 L8.8153,20.0004 C8.2743,20.0004 7.7643,19.7804 7.3943,19.4104 C7.0143,19.0304 6.8153,18.5304 6.8153,18.0104 C6.8153,16.9104 5.9143,16.0204 4.7853,16.0204 C4.4143,16.0204 4.0543,16.1204 3.7443,16.3114 C3.2743,16.5704 2.7143,16.6404 2.1943,16.5104 C1.6743,16.3704 1.2243,16.0304 0.9543,15.5804 L0.9543,15.5804 L0.3153,14.4504 C0.0143,13.9814 -0.0757,13.4204 0.0653,12.8904 C0.2043,12.3604 0.5653,11.9104 1.0543,11.6404 C1.3653,11.4704 1.6243,11.2204 1.8043,10.9104 C2.3253,9.9704 1.9943,8.7904 1.0543,8.2404 C0.1043,7.7004 -0.2257,6.5104 0.3153,5.5704 L0.3153,5.5704 L0.9543,4.4504 C1.2243,3.9814 1.6743,3.6404 2.2043,3.5004 C2.7353,3.3604 3.2943,3.4394 3.7643,3.7104 C4.0843,3.8804 4.4343,3.9704 4.7853,3.9704 C5.3253,3.9704 5.8443,3.7604 6.2243,3.3904 C6.6043,3.0204 6.8153,2.5104 6.8153,1.9904 C6.8153,0.8904 7.7243,0.0004 8.8543,0.0004 L8.8543,0.0004 Z M10.6153,7.4814 C9.5653,7.0504 8.3543,7.2804 7.5443,8.0704 C6.7443,8.8504 6.4943,10.0404 6.9343,11.0614 C7.3653,12.0904 8.3843,12.7604 9.5243,12.7604 L9.5243,12.7604 L9.5353,12.7604 C10.2853,12.7704 10.9853,12.4814 11.5143,11.9604 C12.0443,11.4504 12.3443,10.7504 12.3443,10.0204 C12.3543,8.9104 11.6643,7.9004 10.6153,7.4814 Z"
                                            transform="translate(2.5 2)"></path>
                                    </svg>
                                </button>
                            </div>

            
                            <div id="sub-menu-drop"
                                class="absolute right-0 z-10 hidden w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg animate-down ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                <?php if (isset($_SESSION['user'])) {

                                    if ($_SESSION['user']['role_id'] == 1) {   
                                         
                                    echo ' <a href="../../project_polyfood/view/admin/index.php" class=" hover:bg-slate-300 block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem" tabindex="-1" id="menu-item-2">
                                        Trang quản trị
                                    </a> ';}} ?>
                                    
                                    <?php if (isset($_SESSION['user'])) {
                                    echo '
                                    <a href="?url=capnhattk"
                                        class=" hover:bg-slate-300 block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem" tabindex="-1" id="menu-item-2">
                                        Cài đặt tài khoản
                                    </a>';} ?>
                                    <form method="POST" class="mb-0" action="?url=quenmk">
                                    <?php if (!isset($_SESSION['user'])) {
                                    echo " <button type='submit' class='text-gray-700 hover:bg-slate-300 block w-full px-4 py-2 text-left text-sm uppercase' role='menuitem' tabindex='-1' id='menu-item-3'>Quên mật khẩu</button>";} ?>
                                    </form>
                                    <form method="POST" class="mb-0"  action="?url=doimk" role="none">
                                    <?php if (isset($_SESSION['user'])) {
                                      echo " <button type='submit' class='text-gray-700 hover:bg-slate-300 block w-full px-4 py-2 text-left text-sm uppercase' role='menuitem' tabindex='-1' id='menu-item-3'>
                                            Đổi mật khẩu</button>";} ?>
                                    </form>
                                    <form method="POST" class="mb-0"   action="?url=dangnhap" role="none">
                                        <?php if (isset($_SESSION['user'])) {
                                  echo " <button type='submit' name='btn_logoff' class='text-gray-700  hover:bg-slate-300 block w-full px-4 py-2 text-left text-sm uppercase' role='menuitem' tabindex='-1' id='menu-item-3'>Đăng xuất</button>";
                                          } else {
                                  echo " <button type='submit' class='text-gray-700 hover:bg-slate-300 block w-full px-4 py-2 text-left text-sm uppercase' role='menuitem' tabindex='-1' id='menu-item-3'>Đăng nhập</button>";
                                          }?>
                                    </form>
                                    <form method="POST" class="mb-0"  action="?url=dangky" role="none">
                                    <?php if (!isset($_SESSION['user'])) {
                                      echo " <button type='submit' class='text-gray-700 hover:bg-slate-300 block w-full px-4 py-2 text-left text-sm uppercase' role='menuitem' tabindex='-1' id='menu-item-3'>
                                          Đăng ký</button>";} ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>