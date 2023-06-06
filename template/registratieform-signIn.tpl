{extends file="template/layout.tpl"}

{block name="content"}
<<<<<<< HEAD:template/registratieform-signIn.tpl
<h1 class="mt-5">Log In</h1>
    <form action="index.php?action=register" method="POST">
=======
<h1 class="mt-5">Log in</h1>
    <form action="/index.php?action=register" method="POST">
>>>>>>> feature-product-display:template/registratieform.tpl
        <div class="mb-3">
            <label for="username" class="form-label">Email address</label>
            <input type="text" name="username" class="form-control" id="username">
        </div>
        <div class="mb-3">
            <label for="password1" class="form-label">Password</label>
            <input type="password" name="password1" class="form-control" id="password1">
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Herhaal Password</label>
            <input type="password" name="password2" class="form-control" id="password2">
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
{/block}