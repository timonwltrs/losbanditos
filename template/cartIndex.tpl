{extends file="template/layout.tpl"}

{block name="content"}

    <h1 class="mt-5">Shopping Cart</h1>
    <div class="card-group">

    {foreach $products as $product}
        <div class="col">
            <div class="card" style="width: 19rem;">
                <img class="card-img-top" src="/template/img/{$product->imageName}.jpeg" alt="Card image cap" style="height: 350px">
                <div class="card-body">
                    <h5 class="card-title">{$product->brand}</h5>
                    <p class="btn ">€{$product->price}</p>
{*                    form is voor het product uit de shopping cart te halen            *}
                    <form>
                        <svg style="float: right;height: 20px"  fill="#ff0000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="68px" height="68px" viewBox="0 0 485 485" xml:space="preserve" stroke="#ff0000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <rect x="67.224" width="350.535" height="71.81"></rect> <path d="M417.776,92.829H67.237V485h350.537V92.829H417.776z M165.402,431.447h-28.362V146.383h28.362V431.447z M256.689,431.447 h-28.363V146.383h28.363V431.447z M347.97,431.447h-28.361V146.383h28.361V431.447z"></path> </g> </g> </g></svg>
                    </form>
                </div>

            </div>
        </div>
    {/foreach}
    </div>

    <div class="card mb-5" style="height: 200px; width: 400px">
        <div class="card-body p-4">
            <div >
                <p class="mb-0 me-5 d-flex align-items-center">
                    <span class="text-muted me-2">Order total: €{$price}</span> <span
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