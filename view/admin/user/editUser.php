
    <main style="border-radius: 10px; background: #fff; box-shadow: 35px 35px 70pxrole
#bebebe, -35px -35px 70px #ffffff; " class="w-full  p-5 mt-5 bg-gray-100">
        <?php
        if (strlen($MESSAGE)) {
            echo "<h5>$MESSAGE</h5>";
        }
        ?>
        <section class="add__user w-full mt-5">
            <section class="add__products-title flex  items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h1 class="text-left lg:text-xl text-gray-500 uppercase">Cật nhật tài khoản</h1>
            </section>

            <section class="mt-5  w-full">
                <form action="?url=editUser" class="form__add-user w-full" method="post" enctype="multipart/form-data">
                    <div class="list__form-group w-full grid  grid-cols-2 gap-5">
                        <div class="form__group flex flex-col">
                            <label for="usertid" class="text-gray-500 text-xs sm:text-sm md:text-base lg:text-base">USER
                                ID</label>
                            <input readonly type="text" name="user_id" id="user__id" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none
text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3
rounded-md text-gray-500
" value="<?= $user_id ?>" />
                        </div>
                        <div class="form__group flex flex-col">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">USER
                                NAME</label>
                            <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="user_name" id="name" placeholder="Nhập user name..." value="<?= $user_name ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['user_name']) ? $error['user_name'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Họ và
                                tên</label>
                            <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="name" id="name" placeholder="Nhaaoj họ và tên..." value="<?= $name ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['name']) ? $error['name'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Mật
                                khẩu</label>
                            <input type="password" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="password" id="name" placeholder="******" value="<?= $password ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['password']) ? $error['password'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Địa chỉ
                                email</label>
                            <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="email" id="name" placeholder="Nhập email..." value="<?= $email ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['email']) ? $error['email'] : ''; ?>
                            </span>
                        </div>

                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Số điện
                                thoại</label>
                            <input type="text" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="phone" id="name" placeholder="Nhập số điện thoại" value="<?= $phone ?>" />
                            <span class="text-red-500 text-xs">
                                <?= isset($error['phone']) ? $error['phone'] : ''; ?>
                            </span>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Vai
                                trò</label>

                            <select name="role_id" class="mt-2 p-2 px-3  shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm  bg-gray-100 rounded-md text-gray-500">
                                <option value="">Chọn vai trò</option>
                                <?php foreach ($roles as $role) : ?>
                                    <?php extract($role) ?>
                                    <option value="<?= $role_id ?>"><?= $role_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form__group flex flex-col ">
                            <label class="text-xs sm:text-sm md:text-base lg:text-base text-gray-500" for="name">Ảnh đại
                                diện</label>
                            <input type="hidden" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-1 px-3  rounded-md text-gray-500 " name="image" id="name" value="<?= $image ?>" />
                            <input type="file" class="form__input-add__prodcut shadow-2xl border border-gray-200 focus:outline-none text-xs sm:text-sm md:text-base lg:text-base bg-gray-100 mt-2 p-2 px-3  rounded-md text-gray-500 " name="upload_image" id="name" />
                            (<?= $image ?>)
                        </div>
                    </div>
                    <div class="form__add-user--list-button w-full mt-7 flex gap-3 justify-center items-center">
                        <button type="submit" name="btn_update" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                            Cập nhật
                        </button>
                        <button type="reset" name="reset" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border w-[120px] text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                            Nhập lại
                        </button>
                        <a href="?url=listUser" name="btn_list" style="text-shadow: 0.6px 0.6px 0 #fff; color: #61677c; box-shadow: 1.5px 1.5px
2.5px #babecc, -2px -2px 5px #fff;" class="p-2 border  text-center
rounded-md text-sm hover:bg-gray-200 leading-4 ">
                            Danh sách người dùng
                        </a>
                    </div>
                </form>
            </section>
        </section>
        <!-- End add_product -->
    </main>
