<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/images/icon.png" type="image/x-icon">
    <!-- Подключаем Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Конфиг tailwind -->
    <script>
        tailwind.config = {
            theme: {
                container: {
                    // Контейнер всегда по центру
                    center: true,
                    // Контейнер минус 200px
                    screens: {
                        sm: '430px',
                        md: '568px',
                        lg: '824px',
                        xl: '1080px',
                        '2xl': '1336px',
                    },
                },

                extend: {
                    colors: {}
                }
            }
        }
    </script>
    <title>Your Notes</title>
</head>

<body class="bg-sky-100 text-[22px]">
    <nav class="bg-blue-400">
        <div class="container">
            <div class="h-[85px] flex justify-between items-center text-white">
                <a href="/" class="text-5xl">Your Notes</a>
                <a href="/login" class="border-2 py-[2px] px-[10px] rounded">Log In</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            {{content}}
        </div>
    </main>
</body>

</html>