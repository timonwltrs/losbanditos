{extends file="template/layout.tpl"}

{block name="content"}
    <h1 class="mt-5">Change Product</h1>

        <form action="/index.php?action=changeProduct" method="POST">
            <div class="row mb-3">
                <label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
                <div class="col-sm-10">
                    <input type="text" name="brand" class="form-control" id="inputBrand" value={$product->brand}>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="3" maxlength="240">{$product->description}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" name="price" class="form-control" id="inputPrice" value={$product->price} >
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputImagename" class="col-sm-2 col-form-label">Imagename</label>
                <div class="col-sm-10">
                    <input type="text" name="imageName" class="form-control" id="inputImagename" value={$product->imageName}>
                </div>
            </div>
            <input type="hidden" name="id" value="{$product->id}">
            <input type="submit" value="Change" class="btn btn-primary">
        </form>

    {/block}