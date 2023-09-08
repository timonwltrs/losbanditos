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


}

