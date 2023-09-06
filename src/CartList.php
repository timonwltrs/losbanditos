<?php

namespace Losbanditos;

class CartList{
    protected array $cart = [];

    public function addCart(Product $cartItem)
    {
        return $this->cart[] = $cartItem;
    }

    public function getCart(): array
    {
        return $this->cart;
    }
}

