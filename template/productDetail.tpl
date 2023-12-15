{extends file="template/layout.tpl"}
{* product namen met tekens doen het niet met de detail pagina*}
{block name="content"}
    <h1 class="mt-5">Product Details</h1>
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4">
                                    <img id="main-image" src="./template/img/{$product->imageName}.jpeg" width="250"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn d-flex align-items-center"><i class="fa fa-long-arrow-left"></i>
                                        <span class="ml-1"><a href="./index.php?action=productIndex">Back</a></span>
                                    </div>
                                    <i class="fa fa-shopping-cart text-muted"></i>
                                </div>
                                <div class="mt-4 mb-3"><span
                                            class="text-uppercase text-muted brand">{$product->brand}</span>
                                    <div class="price d-flex flex-row align-items-center"><span
                                                class="act-price">${$product->price}</span>
                                    </div>
                                </div>
                                <p class="about">{$product->description}</p>

                                <div class="cart mt-4 align-items-center">
                                    <form action="./index.php?action=cartAdd&name={$product->brand}" method="POST">
                                        <input type="hidden" name="name" value="{$product->brand}">
                                        <input class="btn btn-danger text-uppercase mr-2 px-4" type="submit" name="cart" value="Add to Cart" class="btn btn-dark">
                                    </form>
                                    <input type="number" id="quantity" name="quantity" min="1" max="5">

                                    <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{/block}
