<?php

namespace Losbanditos;

class Product
{
    public int $id;
    public string $brand;
    public string $description;
    public float $price;
    public string $imageName;
    public static array $products = [];
    private array $reviews = [];
    public static array $productFavList = [];
    public static array $productCartList = [];

    public function __construct(int $id, string $brand, string $description, float $price, string $imageName)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->description = $description;
        $this->price = $price;
        $this->imageName = $imageName;
        self::$products[] = $this;

    }

    public function setProduct(string $brand, string $description, float $price, string $imageName)
    {
        $this->brand = $brand;
        $this->description = $description;
        $this->price = $price;
        $this->imageName = $imageName;
        self::$products[] = $this;
        Db::$db->insert("products", ["brand" => $brand, "description" => $description, "price" => $price, "imageName" => $imageName]);
    }



    public static function getProducts()
    {
        //wat selecteer ik
        $columns = [
            'products' => ['id', 'brand', 'description', 'price', 'imageName']
        ];

        //hier haal ik alles op uit de database
        $products = Db::$db->select($columns);

        self::$products = [];

        foreach ($products as $product)
        {
            $product = new Product($product['id'], $product['brand'],$product['description'],$product['price'],$product['imageName']);
        }
        return self::$products;

    }

    public static function productDetail(string $name)
    {
        //selecteren vanuit db
        $columns = [
            'products' => ['brand', 'description', 'price', 'imageName']
        ];

        $params = [
            'brand' => $name
        ];

        $productArray = Db::$db->select($columns, $params);
        $product = new Product($productArray[0]['brand'],$productArray[0]['description'], $productArray[0]['price'], $productArray[0]['imageName']);
        //var_dump($productArray);
        self::$products = [];

        return $product;
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


}