<div class="content">
    <div class="content-title">
        Welcome to Your Notes! All your notes in one place!
    </div>
    <div class="note">
        <div class="note-left">
            <div class="note-title">To wash the car</div>
            <div class="note-text">Tomorrow I want to thoroughly wash my car and its interior using all means of
                cleaning
            </div>
        </div>
        <div class="note-right">
            <div class="note-edit"><a href="#">Edit</a></div>
            <div class="note-delete"><a href="#">Delete</a></div>
        </div>
    </div>
</div>

<style>
    .content {
        display: flex;  
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: black;
        height: calc(100vh - 75px);
    }

    .content-title {
        font-size: 42px;
        font-weight: 300;
    }

    .note {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 75px;
        background-color: #3581b8;
        width: 900px;
        padding: 11px 21px;
        border-radius: 5px;
    }

    .note-text {
        font-size: 22px;
        font-weight: 300;
        margin-top: 7px;
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
        margin: 0 21px;
    }
</style>