{extends file="template/layout.tpl"}

{block name="content"}
    <div class="home-body">
        <section class="main-home">
            <div class="main-text">
                <h5>Summer Collection</h5>
                <h1>New Summer <br> Collection 2023</h1>
                <p> Theres nothing like trend</p>
                <a href="/index.php?action=productIndex" class="main-btn">Shop now</a>
            </div>
        </section
    </div>
    </div>
    <section>
        <div class="row text-center">
            <div class="col-md-12">
                <!-- Carousel wrapper -->
                <div id="carouselBasicExample" class="carousel slide carousel-dark" data-mdb-ride="carousel">
                    <!-- Inner -->
                    <div class="carousel-inner">
                        <!-- Single item -->
                        <div class="carousel-item active">
                            <p class="lead font-italic mx-4 mx-md-5">
                                "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
                                numquam iure provident voluptate esse quasi, voluptas nostrum quisquam!"
                            </p>
                            <div class="mt-5 mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                                     class="rounded-circle img-fluid shadow-1-strong" alt="smaple image" width="100"
                                     height="100" />
                            </div>
                            <p class="text-muted mb-0">- Anna Morian</p>
                        </div>

                        <!-- Single item -->
                        <div class="carousel-item">
                            <p class="lead font-italic mx-4 mx-md-5">
                                "Neque cupiditate assumenda in maiores repudiandae mollitia adipisci maiores
                                repudiandae mollitia consectetur adipisicing architecto elit sed adipiscing
                                elit."
                            </p>
                            <div class="mt-5 mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp"
                                     class="rounded-circle img-fluid shadow-1-strong" alt="smaple image" width="100"
                                     height="100" />
                            </div>
                            <p class="text-muted mb-0">- Teresa May</p>
                        </div>

                        <!-- Single item -->
                        <div class="carousel-item">
                            <p class="lead font-italic mx-4 mx-md-5">
                                "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                dolore eu fugiat nulla pariatur est laborum neque cupiditate assumenda in
                                maiores."
                            </p>
                            <div class="mt-5 mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                                     class="rounded-circle img-fluid shadow-1-strong" alt="smaple image" width="100"
                                     height="100" />
                            </div>
                            <p class="text-muted mb-0">- Kate Allise</p>
                        </div>
                    </div>
                    <!-- Inner -->

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample"
                            data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample"
                            data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Carousel wrapper -->
            </div>
        </div>
    </section>

</section>


{/block}