<?php

namespace Losbanditos;

include '../includes/nav.html';

class Product
{
    public string $brand;
    public string $description;
    public float $price;
    protected string $imageName;
    protected string $prodUrl;

    public function __construct(string $brand, string $description , float $price, string $imageName, string $prodUrl)
    {
        $this->brand = $brand;
        $this->description = $description;
        $this->price = $price;
        $this->imageName = $imageName;
        //imageName = file name (image (jpeg))
        $this->prodUrl= $prodUrl;
        //prodUrl = file name (php file)

    }


    public function addImage()
    {
        return "<a href='$this->prodUrl'><img src='../img/$this->imageName.jpeg' width=210 height=190></a>";
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
                "<div class='btn'>".
                "<button class='addcart-btn' type='submit'>Add</button>".
                "<input class='quantity-btn' type='number' min='1' max='5'>".
            "</div>"
            ."</div>";
    }
}

//standard product display
$product1 = new Product("Carhartt Wip", "Detroit Jacket 1983", "124.99", 'detroitjacket','#');
echo $product1->printProduct();

$product2 = new Product("Carhartt Wip", "Detroit Jacket 1983", "84.99", 'detroitjacket', '#');
echo $product2->printProduct();

$product3 = new Product("Carhartt Wip", "Detroit Jacket 1983", "69.99", 'detroitjacket', '#');
echo $product3->printProduct();

$product4 = new Product("Carhartt Wip", "Detroit Jacket 1983", "179.99", 'detroitjacket', '#');
echo $product4->printProduct();

$product5 = new Product("Carhartt Wip", "Detroit Jacket 1983", "124.99", 'detroitjacket', '#');
echo $product5->printProduct();

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

    .btn{
        display: flex;
    }

    .addcart-btn{
        color: black;
        font-size: 15px;
        background-color: gray;
        width: 80%;
    }

    .quantity-btn{
        background-color: #adadad;
    }
</style>