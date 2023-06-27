{extends file="template/layout.tpl"}

{block name="content"}
    <div class="row row-cols-1 row-cols-md-4 g-4">

        <div class="col">
            <div class="card">
                <img src="/template/img/{$fav->imageName}.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$fav->brand}</h5>
                    <p class="card-text">{$fav->description}</p>
                    <p class="card-text">${$fav->price}</p>
                </div>
            </div>
        </div>
    </div>
{/block}