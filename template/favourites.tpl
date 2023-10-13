{extends file="template/layout.tpl"}

{block name="content"}
    <div class="text-center my-5">

        <h1 class="mt-5">Favourites List</h1>
    </div>
    <div class="card-group">

        {foreach $favourites as $fav}
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/template/img/{$fav.imageName}.jpeg" alt="Card image cap">

{*                    <div class="card-body">*}
{*                        <h5 class="card-title">{$fav->brand}</h5>*}
{*                        <p class="card-text">{$fav->description}</p>*}
{*                        <p class="btn">Price: €{$fav->price}</p>*}
{*                        <div class="btn prod-card-btn">*}

{*                            <form action="/index.php?action=cartAdd&name={$fav->brand}" method="POST">*}
{*                                <input type="hidden" name="name" value="{$fav->brand}">*}
{*                                <input type="submit" name="cart" value="Add to Cart" class="btn btn-dark">*}
{*                            </form>*}
{*                            <form action="/index.php?action=cartDelete" method="POST">*}
{*                                <input type="hidden" name="brand" value="{$fav->brand}">*}
{*                                <input type="submit" name="cancel" value="Delete" class="btn btn-dark fav-btn"*}
{*                                       style="font-size: 14px; color: white; background-color: red"/>*}
{*                            </form>*}
{*                        </div>*}
{*                    </div>*}

                </div>
            </div>
            <br>
        {/foreach}
    </div>
{/block}