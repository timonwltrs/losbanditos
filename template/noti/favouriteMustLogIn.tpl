{extends file="template/layout.tpl"}

{block name="content"}
    <div class="error">
        <div class="d-flex align-items-center justify-content-center">
            <div class="text-center">
                <p class="fs-3"> <span class="text-danger">Oops! :(</span></p>
                <p class="lead">
                    You Can't Access Your Favourite List Because You Are Not Logged In
                </p>
                <a href="/index.php?action=loginForm" class="btn btn-primary">Log In</a>
            </div>
        </div>
    </div>
{/block}