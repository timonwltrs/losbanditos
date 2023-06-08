{extends file="template/layout.tpl"}

{block name="content"}
    <h1 class="mt-5">Log in</h1>
    <form action="/index.php?action=userpage" method="POST">
    <form action="/index.php?action=productDetail&name={""}" method="POST">

        <div class="mb-3">
            <label for="user" class="form-label">Enter username</label>
            <input type="text" name="user" class="form-control" id="user">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
{/block}