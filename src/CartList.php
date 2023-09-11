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


}

