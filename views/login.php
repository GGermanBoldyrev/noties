<main>
    <form action="#" method="post" class="form">
        <div class="title">Login Form</div>
        <input type="text" name="email" placeholder="Email Address" class="email">
        <input type="password" name="password" placeholder="Password">
        <div class="link"><a href="#" class="f-pass">Forgot password?</a></div>
        <button type="submit">Login</button>
        <div class="link"><a href="/register">Not a member? Register now</a></div>
    </form>
</main>


<style>

    a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        color: #F3F8F2;
        transition: 0.25s;
    }

    main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: #3581b8;
        width: 525px;
        color: black;
        padding: 30px;
        border-radius: 10px;
    }

    .form a {
        font-size: 18px;
    }

    .title {
        font-size: 48px;
        text-align: center;
        margin-bottom: 30px;
    }

    input {
        font-size: 18px;
        padding: 7px 14px;
    }

    input:focus {
        outline: none;
    }

    .email {
        margin-bottom: 15px;
    }

    .link {
        margin-left: 3px;
        margin-top: 2px;
    }

    button {
        margin-top: 22px;
        background-color: #4CAF50;
        border: none;
        border-radius: 5px;
        padding: 7px 0;
        font-size: 20px;
    }

    button:hover {
        cursor: pointer;
        background-color: #449e48;
        transition: 0.25s;
    }
</style>