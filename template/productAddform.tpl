{extends file="template/layout.tpl"}

{block name="content"}
    <h1 class="mt-5">Add product</h1>

    <form action="./index.php?action=productAdd" method="POST">
        <div class="row mb-3">
            <label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10">
                <input type="text" name="brand" class="form-control" id="inputBrand">
            </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" rows="3" maxlength="120"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="number" name="price" class="form-control" id="inputPrice" step=".01" >
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputImagename" class="col-sm-2 col-form-label">Imagename</label>
            <div class="col-sm-10">
                <input type="text" name="imagename" class="form-control" id="inputImagename">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputProdurl" class="col-sm-2 col-form-label">Product url</label>
            <div class="col-sm-10">
                <input type="text" name="produrl" class="form-control" id="inputProdurl">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add product</button>
    </form>

{/block}