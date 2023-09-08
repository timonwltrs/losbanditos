{extends file="template/layout.tpl"}

{block name="content"}
    {*    <p><span class="h2">Shopping Cart </span><span class="h4">(1 item in your cart)</span></p>*}

    {*    <section class="vh-100" >*}
    {*        <div class="container h-100">*}
    {*            <div class="row d-flex justify-content-center align-items-center h-100">*}
    {*                <div class="col">*}
    {*                    {foreach $products as $product}*}
    {*                    <div class="card mb-4">*}
    {*                        <div class="card-body p-4">*}
    {*                            <div class="row align-items-center">*}
    {*                                <div class="col-md-2">*}
    {*                                    <img class="card-img-top" src="/template/img/{$product->imageName}.jpeg" alt="Card image cap" style="height: 150px">*}
    {*                                </div>*}
    {*                                <div class="col-md-2 d-flex justify-content-center">*}
    {*                                    <div>*}
    {*                                        <p></p>*}
    {*                                    </div>*}
    {*                                </div>*}
    {*                                <div class="col-md-2 d-flex justify-content-center">*}
    {*                                    <div>*}
    {*                                        <p class="small text-muted mb-4 pb-2">BRAND</p>*}
    {*                                        <h5 class="card-title">{$product->brand}</h5>*}

    {*                                    </div>*}
    {*                                </div>*}
    {*                                <div class="col-md-2 d-flex justify-content-center">*}
    {*                                    <div>*}
    {*                                        <p class="small text-muted mb-4 pb-2">Quantity</p>*}
    {*                                        <p class="lead fw-normal mb-0">1</p>*}
    {*                                    </div>*}
    {*                                </div>*}
    {*                                <div class="col-md-2 d-flex justify-content-center">*}
    {*                                    <div>*}
    {*                                        <p class="small text-muted mb-4 pb-2">PRICE</p>*}
    {*                                        <p class="btn ">{$product->price}</p>*}

    {*                                    </div>*}
    {*                                </div>*}
    {*                                <div class="col-md-2 d-flex justify-content-center">*}
    {*                                    <div>*}
    {*                                        <p class="small text-muted mb-4 pb-2">Total</p>*}
    {*                                        <p class="lead fw-normal mb-0">$799</p>*}
    {*                                    </div>*}
    {*                                </div>*}
    {*                            </div>*}
    {*                        </div>*}
    {*                    </div>*}

    {*                </div>*}
    {*                {/foreach}*}
    {*                *}
    {*            </div>*}
    {*        </div>*}
    {*    </section>*}
    <h1 class="mt-5">Shopping Cart</h1>
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
    <div class="card mb-5">
        <div class="card-body p-4">
            <div class="float-end">
                <p class="mb-0 me-5 d-flex align-items-center">
                    <span class="small text-muted me-2">Order total:</span> <span
                            class="lead fw-normal">$799</span>
                </p>
            </div>
            <button type="button" class="btn btn-light btn" style="height: 50px">Continue shopping</button>
            <button type="button" class="btn btn-primary" style="height: 50px ">Checkout</button>
        </div>
    </div>
    <div class="d-flex justify-content-end">
    </div>
    {*    </div>*}
{/block}