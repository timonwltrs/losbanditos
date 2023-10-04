<?php

namespace Losbanditos;

class ProductFavList
{
    protected array $favourites = [];

    public function addFavourites(Product $product)
    {
        return $this->favourites[] = $product;
    }

    public static function getFavouriteList()
    {
        //wat selecteer ik
        $columns = [
            'products' => ['brand', 'description', 'price', 'imageName']
        ];

        //hier haal ik alles op uit de database
        $products = Db::$db->select($columns);

        Product::$products = [];

        foreach ($products as $product)
        {
            $product = new Product($product['brand'],$product['description'],$product['price'],$product['imageName']);
        }
        return Product::$products;
    }

    public function getFavourites(): array
    {
        return $this->favourites;
    }
}