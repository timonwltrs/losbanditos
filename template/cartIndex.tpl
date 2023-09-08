{extends file="template/layout.tpl"}

{block name="content"}

    <h1 class="mt-5">Shopping Cart</h1>
    <div class="card-group">

    {foreach $products as $product}
        <div class="col">
            <div class="card" style="width: 19rem;">
                <img class="card-img-top" src="/template/img/{$product->imageName}.jpeg" alt="Card image cap" style="height: 240px">
                <div class="card-body">
                    <h5 class="card-title">{$product->brand}</h5>
                    <p class="btn btn-primary">{$product->price}</p>
                </div>
            </div>
        </div>

    {/foreach}
    </div>

    <div class="card mb-5" style="height: 200px; width: 400px">
        <div class="card-body p-4">
            <div >
                <p class="mb-0 me-5 d-flex align-items-center">
                    <span class="small text-muted me-2">Order total: </span> <span
                            class="lead fw-normal"></span>
                </p>
            </div>
            <button type="button" class="btn btn-light btn" style="height: 50px">Continue shopping</button>
            <button type="button" class="btn btn-primary" style="height: 50px ">Checkout</button>
        </div>
    </div>
    <div class="d-flex justify-content-end">
    {*    </div>*}
{/block}