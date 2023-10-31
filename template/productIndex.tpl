{extends file="template/layout.tpl"}

{block name="content"}

    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Shop Here With <br> Our  <span class="text-success">NEW</span> Products</h1>
                        <p class="lead text-white-50 mb-4">Take a look in our new collection of fashion for this season !</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        {foreach $products as $product}
            <div class="col">
                <div class="card">
                    <img src="/template/img/{$product->imageName}.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$product->brand}</h5>
                        <p class="card-text">{$product->description}</p>
                        <p class="card-text">${$product->price}</p>
                    </div>
                    <div class="btn prod-card-btn">
                        <form action="/index.php?action=favouritesAdd&name{$product->brand}" method="POST">
                            <input type="hidden" name="productid" value="{$product->id}">
                            <input type="submit" name="fav" value="♥" class="btn btn-dark fav-btn"/>
                        </form>
                        <form action="/index.php?action=cartAdd&name={$product->brand}" method="POST">
                            <input type="hidden" name="name" value="{$product->brand}">
                            <input type="submit" name="cart" value="Add to Cart" class="btn btn-dark">
                        </form>
                        <form action="/index.php?action=productDetail&name={$product->brand}" method="POST">
                            <input type="submit" name="detail" value="Details" class="btn btn-dark info-btn""/>
                        </form>

                        <form action="/index.php?action=changeProductForm&name={$product->brand}" method="POST">
                            <input type="submit" name="change" value="✎">
                        </form>

                    </div>
                </div>
            </div>
        {/foreach}
    </div>
    <div style="float: right; justify-content: center;">
        <p>Add </p>
        <div style="margin-bottom: 120px; text-align: center">
            <a href="/index.php?action=productAddform">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" style="float: right" height="20" fill="currentColor"
                     class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>

            </a>

        </div>

    </div>
{/block}
