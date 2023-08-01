<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
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
            <div class="content">
                <div class="title">
                    Welcome to Your Notes! All your notes in one place!
                </div>
                <div class="note">
                    <div class="note-left">
                        <div class="note-title">To wash the car</div>
                        <div class="note-text">Tomorrow I want to thoroughly wash my car and its interior using all means of cleaning</div>
                    </div>
                    <div class="note-right">
                        <div class="note-edit"><a href="#">Edit</a></div>
                        <div class="note-delete"><a href="#">Delete</a></div>
                    </div>
                </div>
            </div>
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
        width: 840px;
        margin: 0 auto;
    }

    .nav-bar {
        background-color: #3581b8;
    }

    .nav-content {
        display: flex;
        justify-content: space-between;
        height: 50px;
        align-items: center;
    }

    .logo {
        font-size: 32px;
    }

    .login {
        border: 1px solid #F3F8F2;
        padding: 3px 10px;
        border-radius: 5px;
        font-weight: 300;
    }

    .content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: black;
        height: calc(100vh - 50px);
    }

    .title {
        font-size: 28px;
        font-weight: 300;
    }

    .note {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 50px;
        background-color: #3581b8;
        width: 600px;
        padding: 7px 14px;
        border-radius: 5px;
    }

    .note-text {
        font-weight: 300;
        font-size: 15px;
        margin-top: 5px;
    }

    .note-title {
        border-bottom: 1px solid black;
        width: fit-content;
    }

    .note-right {
        display: flex;
    }

    .note-right a {
        color: black;
    }

    .note-right a:hover {
        color: #F3F8F2;
        transition: 0.25s;
    }

    .note-edit {
        margin: 0 14px;
    }

</style>