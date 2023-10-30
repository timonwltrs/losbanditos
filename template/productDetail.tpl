{extends file="template/layout.tpl"}

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
                                    <img id="main-image" src="/template/img/{$product->imageName}.jpeg" width="250"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn d-flex align-items-center"><i class="fa fa-long-arrow-left"></i>
                                        <span class="ml-1"><a href="/index.php?action=productIndex">Back</a></span>
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
                                    <form action="/index.php?action=cartAdd&name={$product->brand}" method="POST">
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

    {*    hier komt review page*}
    <div class="container mt-5 mb-5">
        <h2>Place review</h2>
        <form action="index.php?action=productDetail&name={$name}" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select class="form-control" id="rating" name="rating" required>
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
            </div>

            <div class="form-group">
                <label for="review">Review:</label>
                <textarea class="form-control" id="review" name="review" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>

        {foreach $product->getReviews() as $review}

{*            <p>{$review->getName()}</p>*}

                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body m-3">
                                <div class="row">
                                    <div class="col-lg-4 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20%2810%29.webp"
                                             class="rounded-circle img-fluid shadow-1" alt="woman avatar" width="200" height="200" />
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-muted fw-light mb-4">{$review->getComment()}
                                        </p>
                                        <p class="fw-bold lead mb-2"><strong>{$review->getName()}</strong></p>
                                        <p class="fw-bold text-muted mb-0">{$review->getRating()}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        {/foreach}
    </div>
{/block}
