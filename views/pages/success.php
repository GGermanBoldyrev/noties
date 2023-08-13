<!--В переменную $text пишем сообщение, что прошло успешно-->
<main class="flex justify-center items-center flex-col h-[calc(100vh-85px)]">
    <div class="bg-blue-400 flex flex-col rounded px-[30px] py-[40px] items-center text-white w-[400px]">
        <img src="images/success.png" alt="Success icon" class="w-[120px]">
        <div class="mt-[20px] text-4xl">Success</div>
        <div class="text-2xl mt-[50px] font-light"><?=$text?></div>
    </div>
</main>