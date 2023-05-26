{extends file="template/layout.tpl"}

{block name="content"}
    <h1 class="mt-5">Blablabla</h1>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        {foreach $products as $product}
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$product->brand}</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        {/foreach}

    </div>

{/block}