<?php

namespace Losbanditos;

class ProductFavList
{
    public static array $favourites = [];

    public function addFavourites(Product $product): void
    {
        self::$favourites[] = $product;
    }

    public static function getFavourites(): array
    {
        return self::$favourites;
    }
}