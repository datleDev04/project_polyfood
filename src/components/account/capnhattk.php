<main class="w-full mt-14">
        <h1 class="text-3xl text-center mt-10 mb-10">Cài đặt tài khoản</h1>
        <div class="form__login my-10 w-full flex justify-center mb-20">
          <form action="?url=capnhattk" method="post" enctype="multipart/form-data" class="form__login--content w-[900px] sm:w-[900px]  flex flex-col  gap-7">
            <?php
            if (strlen($MESSAGE)) {
              echo "<h5 class=''>$MESSAGE</h5>";
            }
            ?>
            <div class="flex justify-around col-span-2">
                <div class="w-[30%]">
                            <div class="form__group flex flex-col gap-2 mb-6">
                        <label for="user_name">Tên đăng nhập</label>
                        <input type="text" name="user_name" id="username" class="form__input  text-xs border border-gray-700 p-3 w-full rounded-lg
                            focus:border-orange-500 focus:outline-none" placeholder="Tên đăng nhập"  value="<?= $user_name ?>" />
                        <span class="text-red-500 text-xs">
                            <?php echo isset($error['user_name']) ? $error['user_name'] : ''; ?>
                        </span>
                        </div>

                        <div class="form__group flex flex-col gap-2 mb-6 ">
                        <label for="name">Họ và tên</label>
                        <input type="text" name="name" id="name" placeholder="Họ và tên" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-lg
                            focus:border-orange-500 focus:outline-none" value="<?= $name ?>" />
                        <span class="text-red-500 text-xs">
                            <?php echo isset($error['name']) ? $error['name'] : ''; ?>
                        </span>
                        </div>

                        
                </div>
                <div class="w-[30%]">
                <div class="form__group flex flex-col gap-2 mb-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-lg focus:border-orange-500 focus:outline-none" placeholder="Email" value="<?= $email ?>" />
                        <span class="text-red-500 text-xs">
                            <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                        </span>
                        </div>
                    <div class="form__group flex flex-col gap-2 mb-6">
                    <label for="phone">Số điện thoại</label>
                    <input type="tel" name="phone" id="phone" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-lg focus:border-orange-500 focus:outline-none" placeholder="Số điện thoại" value="<?= $phone ?>" />
                    <span class="text-red-500 text-xs">
                        <?php echo isset($error['phone']) ? $error['phone'] : ''; ?>
                    </span>
                    </div>

                    

            </div>
                <div class="w-[30%] ">
                <div class="form__group flex flex-col gap-2 mb-6">

                    
                    <label for="image_upload">Avatar</label>
                    <input type="file" name="image_upload" id="image_upload" class="form__input  text-xs border border-gray-700  p-3 w-full rounded-lg focus:border-orange-500 focus:outline-none" placeholder="image" />
                    <img class="" style="width:150px;height:150px;display:block;margin:0 auto;" src="<?= $IMAGE_DIR ?>users/<?= $image ?>">
                    </div>
                </div>
                
            </div>

            <div class="form__group flex  justify-center items-center gap-3">
                    <button type="submit" name="btn_update" class="text-white bg-orange-600 p-2 mb-6 rounded-lg w-full sm:w-[100px] text-center">
                        UPDATE
                    </button>
                    </div>
            <div>
                
                <input name="user_id" value="<?= $user_id ?>" type="hidden">
                <input name="role_id" value="<?= $role_id ?>" type="hidden">
                <input name="password" value="<?= $password ?>" type="hidden">
                <input name="image" value="<?= $image ?>" type="hidden">
            </div>
            <!--Default value-->
          </form>
        </div>
      </main>