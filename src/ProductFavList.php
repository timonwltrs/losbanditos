<?php

namespace Losbanditos;

class ProductFavList
{
    protected array $favourites = [];

    public function addFavourites(Product $product): void
    {
        $this->favourites[] = $product;
    }
}