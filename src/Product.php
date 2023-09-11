<?php

namespace Losbanditos;

class Product
{
    public string $brand;
    public string $description;
    public float $price;
    public string $imageName;
    public string $prodUrl;
    public static array $products = [];
    private array $reviews = [];
    public static array $productFavList = [];
    public static array $productCartList = [];

    public function __construct(string $brand, string $description, float $price, string $imageName, string $prodUrl)
    {
        $this->brand = $brand;
        $this->description = $description;
        $this->price = $price;
        $this->imageName = $imageName;
        //imageName = file name (image (jpeg))
        $this->prodUrl = $prodUrl;
        self::$products[] = $this;

    }

    public static function productDetail(string $name)
    {
        foreach (self::$products as $product) {
            if ($name == $product->brand) {
                return $product;
            }
        }
    }


    public function addReview(string $name, int $rating, string $comment): void
    {
        $review = new Review($name, $rating, $comment);
        $this->reviews[] = $review;
    }

    public function getReviews(): array
    {
        return $this->reviews;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public  static function getTotalPrice()
    {
        foreach (self::$productCartList as $list)
        {
            $prices = $list->price;
            array_sum($prices);
            return $prices;

        }
    }


}