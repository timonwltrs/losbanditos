{extends file="template/layout.tpl"}

{block name="content"}
    <h1 class="mt-5">Favourites List</h1>
    <div class="card-group">

        {foreach $products as $product}
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/template/img/{$product->imageName}.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{$product->brand}</h5>
                        <p class="card-text">{$product->description}</p>
                        <p class="btn">Price: €{$product->price}</p>
                        <div class="btn prod-card-btn">

                            <form action="/index.php?action=cartAdd&name={$product->brand}" method="POST">
                                <input type="hidden" name="name" value="{$product->brand}">
                                <input type="submit" name="cart" value="Add to Cart" class="btn btn-dark">
                            </form>
                            <form action="/index.php?action=cartDelete" method="POST">
                                <input type="hidden" name="brand" value="{$product->brand}">
                                <input type="submit" name="cancel" value="Delete" class="btn btn-dark fav-btn"
                                       style="font-size: 14px; color: white; background-color: red"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        {/foreach}
    </div>
{/block}