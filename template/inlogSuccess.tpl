{extends file="template/layout.tpl"}

{block name="content"}
        <div class="text-center">
            <h1 class="display-1 fw-bold"></h1>
            <p class="fs-3">You  <span class="text-success">Successfully</span> Logged In</p>
            <p class="lead">
                Click here to back to the home page
            </p>
            <a href="./index.php?action=home" class="btn btn-primary">Go Home</a>
        </div>
{/block}
