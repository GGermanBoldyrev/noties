<main class="flex justify-center items-center flex-col h-[calc(100vh-85px)]">
    <form action="#" method="post" class="w-[550px] bg-blue-400 px-[30px] py-[30px] rounded">
        <div class="text-white text-5xl text-center mb-[30px]">Register</div>
        <div class="flex flex-col [&>input]:py-1 [&>input]:px-2 [&>input]:rounded [&>input]:text-xl">
            <input type="text" name="email" placeholder="Email Address" class="focus:outline-none">
            <input type="password" name="password" placeholder="Password" class="my-[15px] focus:outline-none">
            <input type="password" name="confirmPassword" placeholder="Repeat Password" class="focus:outline-none">
        </div>
        <div class="w-full text-center mt-[30px]">
            <button type="submit" class="bg-green-400 py-[2px] w-full rounded hover:bg-green-500 duration-200">Register</button>
        </div>
        <a href="/login" class="text-lg ml-[5px] hover:text-white duration-200">Have an account? Login now</a>
    </form>
</main>