<?php

namespace Losbanditos;

class Product
{
    public string $brand;
    public string $description;
    public float $price;
    protected string $imageName;
    protected string $prodUrl;
    public static array $products = [];

    public function __construct(string $brand, string $description , float $price, string $imageName, string $prodUrl)
    {
        $this->brand = $brand;
        $this->description = $description;
        $this->price = $price;
        $this->imageName = $imageName;
        //imageName = file name (image (jpeg))
        $this->prodUrl= $prodUrl;
        //prodUrl = file name (php file)
        self::$products[] = $this;

    }


    public function getImage()
    {
        return "<a href='$this->prodUrl'><img src='../img/$this->imageName.jpeg' width=210 height=190></a>";
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function printProduct(): string
    {
        return "<div class='product'>".
             $this->getImage() . "<br>" .
                "<ul>".
                    "<li>". $this->getBrand() ."</li>".
                    "<li>". $this->description."</li>".
                    "<li>". "$".$this->price ."</li>"
                ."</ul>".
                "<div class='btn'>".
                "<button class='addcart-btn' type='submit'>Add to Cart</button>".
                "<input class='quantity-btn' type='number' min='1' max='5'>".
            "</div>"
            ."</div>";
    }
}



?>