<?php

namespace Losbanditos;

class User
{
    private string $username;
    private string $password;
    private ProductFavList $productFavList;
    private bool $loggedIn;
    public static array $users = [];
    private $databse;

    //dit is voor de register

    public function register(string $username, string $password1, string $password2)
    {
        if ($this->checkPassword($password1, $password2)) {
            // registeren
            $this->username = $username;
            $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
            $this->password = $hashedPassword;
            self::$users[] = $this;
            $this->productFavList = new ProductFavList();

            Db::$db->insert("user", ["username" => $username, "password1" => $hashedPassword]);
        } else {
            return false;
        }
    }

    //dit is om je wachtwoord the controlerren
    public function checkPassword(string $password1, string $password2)
    {
        if ($password1 === $password2) {
            return true;
        }
        return false;
    }

    //voor favoriten
    public function userFav(Product $product)
    {
        return $this->productFavList->addFavourites($product);
    }
// dit is voor de login.
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


}

