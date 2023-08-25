<main class="flex justify-center items-center flex-col h-[calc(100vh-85px)]">
    <form action="#" method="post" class="w-[550px] bg-blue-400 px-[30px] py-[30px] rounded">
        <!--Header-->
        <div class="text-5xl text-center mb-[30px]">Register</div>
        <!--Input Block-->
        <div class="flex flex-col [&>label>input]:py-1 [&>label>input]:px-2 [&>label>input]:rounded [&>label>input]:text-xl">
            <!-- First input -->
            <label>
                <input type="text" name="email" placeholder="Email Address" class="focus:outline w-full" required
                       value="<?= $email ?? '' ?>">
            </label>
            <div class="text-base text-red-600 ml-[5px] h-6">
                <?= $errors['email'] ?? '' ?>
            </div>
            <!-- Second input -->
            <label>
                <input type="password" name="password" placeholder="Password"
                       class="focus:outline w-full" required
                       value="<?= $password ?? '' ?>">
            </label>
            <div class="text-base text-red-600 ml-[5px] h-6">
                <?= $errors['password'] ?? '' ?>
            </div>
            <!-- Third input -->
            <label>
                <input type="password" name="confirmPassword" placeholder="Repeat Password" required
                       class="focus:outline w-full"
                       value="<?= $confirmPassword ?? '' ?>">
            </label>
            <div class="text-base text-red-600 ml-[5px] h-6">
                <?= $errors['confirmPassword'] ?? '' ?>
            </div>
        </div>
        <!--Submit Block-->
        <div class="w-full text-center mt-[10px]">
            <!--Submit Button-->
            <button type="submit" class="bg-green-400 py-[2px] w-full rounded hover:bg-green-500 duration-200">
                Register
            </button>
        </div>
        <!--Link to SignUp-->
        <a href="/login" class="text-lg ml-[5px] hover:text-white duration-200">Have an account? Login now</a>
    </form>
</main>