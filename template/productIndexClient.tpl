{extends file="template/userpage.tpl"}

{block name="content"}
    <h1 class="mt-5">Products</h1>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card">
                <img src="./template/img/levis-denim.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Levi's</h5>
                    <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit"</p>
                    <p class="card-text">$149.99</p>
                </div>
                <button type="button" class="btn btn-dark">Add to Cart</button>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./template/img/detroitjacket.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Carhartt Wip</h5>
                    <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit"</p>
                    <p class="card-text">$179.99</p>
                </div>
                <button type="button" class="btn btn-dark">Add to Cart</button>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./template/img/dickiespants.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Dickies</h5>
                    <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit"</p>
                    <p class="card-text">$74.99</p>
                </div>
                <button type="button" class="btn btn-dark">Add to Cart</button>
            </div>
        </div>
        
        {foreach $products as $product}
            <div class="col">
                <div class="card">
                    <img src="./template/img/{$product->imageName}.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$product->brand}</h5>
                        <p class="card-text">{$product->description}</p>
                        <p class="card-text">${$product->price}</p>
                    </div>
                    <button type="button" class="btn btn-dark">Add to Cart</button>
                </div>
            </div>
        {/foreach}
    </div>

    <button type="button" class="btn btn-add-product"><a href="./index.php?action=productAddform">Add Products</a></button>
{/block}