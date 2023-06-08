{extends file="template/layout.tpl"}

{block name="content"}
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
                    <form action="/index.php?action=error" method="POST">
                        <input type="submit" name="fav" value="♥" class="btn btn-dark fav-btn""/>
                    </form>
                    <button type="button" class="btn btn-dark">Add to Cart</button>
                    <form action="/index.php?action=productDetail&name={$product->brand}" method="POST">
                        <input type="submit" name="detail" value="Details" class="btn btn-dark info-btn""/>
                    </form>

                </div>
            </div>
        </div>
    {/foreach}
{/block}