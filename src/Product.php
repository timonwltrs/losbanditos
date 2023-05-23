<?php

namespace Losbanditos;

include '../includes/nav.html';

class Product
{
    public string $brand;
    public string $description;
    public float $price;
    protected string $imageName;

    public function __construct(string $brand, string $description , float $price, string $imageName)
    {
        $this->brand = $brand;
        $this->description = $description;
        $this->price = $price;
        $this->imageName = $imageName;
    }

    public function addImage()
    {
        return "<img src='img/$this->imageName.jpeg' width=170 height=150>";
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function printProduct(): string
    {
        return
            "<div class='product'>".
                $this->addImage() . "<br>" .
                "<ul>".
                    "<li>". $this->getBrand() ."</li>".
                    "<li>". $this->description."</li>".
                    "<li>". "$". $this->price ."</li>"
                ."</ul>".
            "</div>";
    }



}
$product1 = new Product("Carhartt Wip", "Detroit Jacket 1983", "124.99", 'detroitjacket');
echo $product1->printProduct();

$product1 = new Product("Carhartt Wip", "Detroit Jacket 1983", "124.99", 'detroitjacket');
echo $product1->printProduct();
?>

<style>
    .product{
        margin-top: 100px;
        background: white;
        width: 170px;
        border-radius: 5px;
    }
</style>
