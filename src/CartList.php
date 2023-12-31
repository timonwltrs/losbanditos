<?php

namespace Losbanditos;

class CartList
{
    protected array $cart = [];

    public function addCart(Product $product)
    {
        return $this->cart[] = $product;
    }

    public function getCart(): array
    {
        return $this->cart;
    }

    public function getTotalPrice(): float
    {
        $totalPrice = 0;
        foreach($this->cart as $product)
        {
            $totalPrice += $product->getPrice();

        }
        return $totalPrice;
    }


    public function removeItem()
    {
        $product = Product::productDetail($productName);
        $key = array_search($product, $this->cart, true);
        if($key !== false)
        {
            unset($this->cart[$key]);
        }
    }

    public function removeCart(string $products)
    {
        $product = Product::productDetail($products);
        $key = in_array($product, $this->cart, true);
        if ($key !== false)
        {
            unset($this->cart);
        }
    }

}

