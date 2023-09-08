<?php

namespace Losbanditos;

class User
{
    private string $username;
    private string $password;
    private ProductFavList $productFavList;
    private CartList $cartList;
    private bool $loggedIn;
    public static array $users = [];

    public function register(string $username, string $password1, string $password2)
    {
        if ($this->checkPassword($password1, $password2)) {
            // registeren
            $this->username = $username;
            $this->password = password_hash($password1, PASSWORD_BCRYPT);
            self::$users[] = $this;
            $this->productFavList = new ProductFavList();
            $this->cartList = new CartList();
        } else {
            //foutmelding geven
        }
    }
    public function checkPassword(string $password1, string $password2)
    {
        if ($password1 === $password2) {
            return true;
        }
        return false;
    }

    public function userFav(Product $product)
    {
        return $this->productFavList->addFavourites($product);
    }

    public function userCart(Product $product)
    {
        return $this->cartList->addCart($product);
    }

    public static function login(string $username, string $password)
    {
        foreach(self::$users as $user)
        {
            if($user->username == $username)
            {
                // ww controleren
                if(password_verify($password, $user->password))
                {
                    // wachtwoord klopt, login
                    return true;
                }else{
                    // wachtwoord klopt niet, error weergeven
                    return false;
                }

            }
        }
        return false;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getFav()
    {
        return $this->productFavList;
    }

    public function getCartList()
    {
        return $this->cartList;
    }
}

