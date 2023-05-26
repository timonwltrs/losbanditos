{extends file="template/layout.tpl"}

{block name="content"}
    <h1 class="mt-5">Blablabla</h1>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        {foreach $products as $product}
        <div class="col">
            <div class="card">
                <img src="/img/{$product->imageName}.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$product->brand}</h5>
                    <p class="card-text">{$product->description}</p>
                    <p class="card-text">${$product->price}</p>

                </div>
            </div>
        </div>
        {/foreach}

    </div>

{/block}