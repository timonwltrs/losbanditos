{extends file="template/layout.tpl"}

{block name="content"}
    <div class="error">
    <div class="d-flex align-items-center justify-content-center">
        <div class="text-center">
            <p class="fs-3"> <span class="text-danger">Oops! :(</span> Page not found.</p>
            <p class="lead">
                The page you’re looking for doesn’t exist.
            </p>
            <a href="/index.php?action=home" class="btn btn-primary">Go Home</a>
        </div>
    </div>
    </div>
{/block}