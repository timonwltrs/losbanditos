{extends file="template/layout.tpl"}

{block name="content"}
    <div class="card-group">
        {foreach $products as $product}
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/template/img/{$product->imageName}.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{$product->brand}</h5>
                        <p class="card-text">{$product->description}</p>
                        <p class="btn btn-primary">{$product->price}</p>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
{/block}