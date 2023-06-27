<?php

namespace Losbanditos;

class ProductFavList
{
    protected array $favourites = [];

    public function addFavourites(Product $product)
    {
        return $this->favourites[] = $product;
    }
}