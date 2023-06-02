{extends file="template/layout.tpl"}

{block name="content"}
    <h1 class="mt-5">Products</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card">
                <img src="/template/img/levis-denim.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Levi's</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac diam
                        accumsan, vehicula augue ac, lobortis ante.</p>
                    <p class="card-text">$150</p>
                </div>
                <div class="btn prod-card-btn">
                    <button type="button" class="btn btn-dark">Add to Cart</button>
                    <button type="button" class="btn btn-dark info-btn">Details</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="/template/img/detroitjacket.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Carhartt Wip</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac diam
                        accumsan, vehicula augue ac, lobortis ante.</p>
                    <p class="card-text">$180</p>
                </div>
                <div class="btn prod-card-btn">
                    <button type="button" class="btn btn-dark">Add to Cart</button>
                    <button type="button" class="btn btn-dark info-btn">Details</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="/template/img/dickiespants.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Dickies</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac diam
                        accumsan, vehicula augue ac, lobortis ante.</p>
                    <p class="card-text">$75</p>
                </div>
                <div class="btn prod-card-btn">
                    <button type="button" class="btn btn-dark">Add to Cart</button>
                    <button type="button" class="btn btn-dark info-btn">Details</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="/template/img/leatherjacket.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Pull & Bear</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac diam
                        accumsan, vehicula augue ac, lobortis ante.</p>
                    <p class="card-text">$70</p>
                </div>
                <div class="btn prod-card-btn">
                    <button type="button" class="btn btn-dark">Add to Cart</button>
                    <button type="button" class="btn btn-dark info-btn">Details</button>
                </div>
            </div>
        </div>

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
    </div>
    <button type="button" value="submit" class="btn btn-add-product"><a href="/index.php?action=productAddform">Add
            Products</a></button>
{/block}