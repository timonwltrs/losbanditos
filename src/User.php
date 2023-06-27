<?php

namespace Losbanditos;

class User
{
    private string $username;
    private string $password;
    private ProductFavList $productFavList;
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

    public function userFav(Product $product): void
    {
        $this->productFavList->addFavourites($product);
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

    public function getUsername()
    {
        return $this->username;
    }

    public static function getFav()
    {
        return Product::$products;
    }

}

