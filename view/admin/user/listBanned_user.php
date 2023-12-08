
                <!-- End header -->
                <main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70px
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
                    <section class="list__accounts w-full">
                        <section class="list__accounts-title  flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-gray-500">
                                <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0A.75.75 0 018.25 6h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75zM2.625 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12A.75.75 0 017.5 12zm-4.875 5.25a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                            </svg>

                            <h1 class="text-left text-xl text-gray-500 uppercase">Danh sách người dùng</h1>

                                <a href="index.php?url=addUser"style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow:
1.5px 1.5px 2.5px #babecc, -2px -2px 5px #fff;" class="ml-[600px] p-2  border rounded-md w-[120px] text-center   text-xs hover:bg-gray-200 leading-4 ">
                    Thêm mới
                </a>
            <a href="?url=listUser"style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow:
1.5px 1.5px 2.5px #babecc, -2px -2px 5px #fff;" class=" p-2  border rounded-md w-[120px] text-center   text-xs hover:bg-gray-200 leading-4 ">
                    Danh sách
                </a>
                        </section>
                        <form action="?url=addUser" method="post">
                            <div class="list__accounts-table w-full mt-4">
                                <table class="w-full text-center rounded-md shadow-md my-3">
                                    <thead class="boder bg-gray-200 px-2 rounded-t-md">
                                        <tr>
                                            <th>
                                                <input type="hidden" />
                                            </th>
                                            <th class=" text-xs  p-2 w-20 font-medium">
                                                Họ tên
                                            </th>
                                            <th class=" text-xs  px-2 py-2 font-medium">
                                                User name
                                            </th>

                                            <th class=" text-xs  px-2 py-2 font-medium">
                                                Email
                                            </th>
                                            <th class=" text-xs  px-2 py-2 font-medium">
                                                Số điện thoại
                                            </th>
                                            <th class=" text-xs  px-2 py-2 font-medium">
                                                Ảnh đại diện
                                            </th>

                                            <th class=" text-xs  px-2 py-2 font-medium">
                                                Vai trò
                                            </th>
                                            <th class=" text-xs  px-6 py-2 font-medium">
                                                Thao tác
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user as $value) : ?>
                                            <?php extract($value) 
                                            
                                            ?>
                                            <tr class="border-t-2 border-dashed">
                                                <td class="p-2 whitespace-nowrap">
                                                    <input type="checkbox" name="user_id[]" value="<?= $user_id ?>" class="checkbox" />
                                                </td>

                                                <td class="p-2 w-20 ">
                                                    <p class="text-xs text-gray-900 whitespace-nowrap">
                                                        <?= $name ?>
                                                    </p>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <p class="text-xs text-gray-900">
                                                        <?= $user_name ?>
                                                </td>

                                                <td class="p-2 whitespace-nowrap">
                                                    <p class="text-xs text-gray-900">
                                                        <?= $email ?>
                                                    </p>
                                                </td>

                                                <td class="p-2 whitespace-nowrap">
                                                    <p class="text-xs text-gray-900">
                                                        <?= $phone ?>
                                                    </p>
                                                </td>
                                                <td class="p-2">
                                                <?php extract($user);
                                                    $imageUser = "../../src/assets/images/users/".$image;
                                                    
                                                ?>
                                                <img class="w-16 h-16 block mx-auto rounded-full" src="<?= $imageUser ?>"/>
                                                </td>



                                                <td class="p-2 whitespace-nowrap">
                                                    <p class="text-xs text-gray-900">
                                                        <?= $role_name ?>
                                                    </p>
                                                </td>
                                                <td class="px-2 mt-7 whitespace-nowrap flex gap-3 items-center justify-center">
                                                    
                                                    <a href="?url=banUser&user_id=<?= $user_id ?>" class="text-indigo-600 hover:text-indigo-900">
                                                    <i class="fa-solid fa-unlock"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </form>
                    </section>
                </main>