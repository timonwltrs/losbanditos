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
        //imageName = file name (for new product)
    }


    public function addImage()
    {
        return "<img src='../img/$this->imageName.jpeg' width=210 height=190>";
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
                    "<li>". "$".$this->price ."</li>"
                ."</ul>".
            "</div>";
    }
}

//standard product display
$product1 = new Product("Carhartt Wip", "Detroit Jacket 1983", "124.99", 'detroitjacket');
echo $product1->printProduct();

$product2 = new Product("Carhartt Wip", "Detroit Jacket 1983", "84.99", 'detroitjacket');
echo $product2->printProduct();

$product3 = new Product("Carhartt Wip", "Detroit Jacket 1983", "69.99", 'detroitjacket');
echo $product3->printProduct();

$product4 = new Product("Carhartt Wip", "Detroit Jacket 1983", "179.99", 'detroitjacket');
echo $product4->printProduct();

$product5 = new Product("Carhartt Wip", "Detroit Jacket 1983", "124.99", 'detroitjacket');
echo $product5->printProduct();

$product6 = new Product("Carhartt Wip", "Detroit Jacket 1983", "74.99", 'detroitjacket');
echo $product6->printProduct();

$product7 = new Product("Carhartt Wip", "Detroit Jacket 1983", "119.49", 'detroitjacket');
echo $product7->printProduct();

$product8 = new Product("Carhartt Wip", "Detroit Jacket 1983", "134.99", 'detroitjacket');
echo $product8->printProduct();

$product9 = new Product("Carhartt Wip", "Detroit Jacket 1983", "24.99", 'detroitjacket');
echo $product9->printProduct();


?>

<style>
    .product{
        display: inline-block;
        margin: 30px;
        margin-top: 100px;
        background: white;
        width: 210px;
        border-radius: 5px;
}

    .product ul li{
        list-style-type: none;
        font-size: 18px;
    }
</style>