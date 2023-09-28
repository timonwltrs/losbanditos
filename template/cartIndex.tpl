{extends file="template/layout.tpl"}

{block name="content"}
    <div class="text-center my-5">

        <h1 class="mt-5">Shopping Cart</h1>
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        {foreach $products as $product}
            <div class="col">
                <div class="card" style="width: 19rem;">
                    <img class="card-img-top" src="/template/img/{$product->imageName}.jpeg" alt="Card image cap"
                         style="height: 350px">
                    <div class="card-body">
                        <h5 class="card-title">{$product->brand}</h5>
                        <p class="btn ">Price: €{$product->price}</p>
                        <div class="btn prod-card-btn">

                            <form action="/index.php?action=favouritesAdd&name{$product->brand}" method="POST">
                                <input type="hidden" name="name" value="{$product->brand}">
                                <input type="submit" name="fav" value="♥" class="btn btn-dark fav-btn"/>
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
        {/foreach}
    </div>
    <br>
    <div class="card mb-5" style="height: 200px; width: 400px">
        <div class="card-body p-4">
            <div>
                <p class="mb-0 me-5 d-flex align-items-center">
                    <span class="card-title" style="font-weight: bold;">Order total: €{$price}</span>
                    <span class="lead fw-normal"></span>
                    <br>
                </p>
            </div>

            <div class=" d-flex flex-row">
                <a href="/index.php?action=productIndex" class="btn btn-light btn" style="height: 50px;">Continue
                    Shopping</a>
                <form action="/index.php?action=cartCompleteDelete" method="POST">
                    <input type="hidden" name="brand" value="{$product->brand}">
                    <input type="submit" class="btn btn-primary" name="cancel" value="Cancel"
                           style="height: 50px;background-color:red;float: right">
                </form>
            </div>
        </div>
    </div>
{/block}