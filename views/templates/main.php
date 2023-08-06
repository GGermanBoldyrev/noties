<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Notes</title>
</head>
<body>
<nav class="nav-bar">
    <div class="container">
        <div class="nav-content">
            <div class="nav-content-left">
                <a href="/" class="logo">Your Notes</a>
            </div>
            <div class="nav-content-right">
                <a href="/login" class="login">Log In</a>
            </div>
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

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    /*
            #EBE9E9 - платина
            #F3F8F2 - мята
            3581b8 - синий
            fcb07e - оранжевый
            dee2d6 - серый
        */

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
        font-size: 22px;
    }

    a {
        text-decoration: none;
        color: #F3F8F2;
    }

    body {
        background-color: #EBE9E9;
        color: #F3F8F2;
    }

    .container {
        width: 1160px;
        margin: 0 auto;
    }

    .nav-bar {
        background-color: #3581b8;
    }

    .nav-content {
        display: flex;
        justify-content: space-between;
        height: 75px;
        align-items: center;
    }

    .logo {
        font-size: 48px;
    }

    .login {
        border: 1px solid #F3F8F2;
        padding: 5px 15px;
        border-radius: 5px;
        font-weight: 300;
    }
</style>