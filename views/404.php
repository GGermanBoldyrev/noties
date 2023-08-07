<main>
    <div class="fallback-title">404 Page Not Found</div>
    <div class="fallback-subtitle">Try our <a href="/" class="fallback-link">homepage</a> instead.</div>
</main>

<style>
    main {
        color: black;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: calc(100vh - 75px);
    }

    .fallback-link {
        color: #3581b8;
        text-decoration: underline;
    }

    .fallback-link:hover {
        color: #3554b8;
        transition: 0.25s;
    }

    .fallback-title, .fallback-subtitle {
        font-weight: 300;
    }

    .fallback-title {
        font-size: 48px;
        margin-bottom: 20px;
    }


</style>