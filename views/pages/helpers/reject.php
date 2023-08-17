<!--В переменную $text записываем текст, что не удалось сделать-->
<main class="flex justify-center items-center flex-col h-[calc(100vh-85px)]">
    <div class="bg-blue-400 flex flex-col rounded px-[30px] py-[40px] items-center text-rose-500 w-[400px]">
        <img src="images/reject.png" alt="Reject icon" class="w-[120px]">
        <div class="mt-[20px] text-4xl">An error occured</div>
        <div class="text-2xl mt-[50px] font-light"><?=$text?></div>
    </div>
</main>