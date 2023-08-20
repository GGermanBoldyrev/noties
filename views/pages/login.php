<main class="flex justify-center items-center flex-col h-[calc(100vh-85px)]">
    <form action="#" method="post" class="w-[550px] bg-blue-400 px-[30px] py-[30px] rounded">
        <div class="text-5xl text-center mb-[30px]">Log In</div>
        <div class="flex flex-col [&>input]:py-1 [&>input]:px-2 [&>input]:rounded [&>input]:text-xl">
            <input type="text" name="email" placeholder="Email Address" class="focus:outline-none required">
            <input type="password" name="password" placeholder="Password" class="mt-[15px] focus:outline-none required">
        </div>
        <div class="link"><a href="#" class="text-lg ml-[5px] hover:text-white duration-200">Forgot password?</a></div>
        <div class="w-full text-center mt-[20px]">
            <button type="submit" class="bg-green-400 py-[2px] w-full rounded hover:bg-green-500 duration-200">Login
            </button>
        </div>
        <a href="/register" class="text-lg ml-[5px] hover:text-white duration-200">Not a member? Register now</a>
    </form>
</main>