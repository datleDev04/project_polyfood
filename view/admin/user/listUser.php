
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
            <a href="?url=banUser"style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow:
1.5px 1.5px 2.5px #babecc, -2px -2px 5px #fff;" class=" p-2  border rounded-md w-[120px] text-center   text-xs hover:bg-gray-200 leading-4 ">
                    Mở khóa
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
                                                    <a href="?url=editUser&user_id=<?= $user_id ?>" class="text-indigo-600 hover:text-indigo-900"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                    </a>
                                                    <a href="?url=delUser&user_id=<?= $user_id ?>" class="text-indigo-600 hover:text-indigo-900"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
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