{extends file="template/layout.tpl"}


{block name="content"}
    <h1 class="mt-5">Log in</h1>
    <form action="./index.php?action=login" method="POST">

        <div class="mb-3">
            <label for="user" class="form-label">Enter username</label>
            <input type="text" name="username" class="form-control" id="user">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <button class="btn btn-login">Submit</button>

        </div>
    </form>
{/block}