<?php

namespace Losbanditos;

class User
{
    private int $id;
    private string $username;
    private string $password;
    private string $usertype;
    private ProductFavList $productFavList;
    private CartList $cartList;
    private bool $loggedIn;
    public static array $users = [];
    public static array $admin = [];
    private $databse;



    public function __construct(string $username, string $usertype,int $id = 0 )
    {
        $this->id = $id;
        $this->username = $username;
        $this->usertype = $usertype;
        $_SESSION['user'] = $this;

    }


    public function setCart()
    {
        if (!isset($this->cartList)) {
            $this->cartList = new CartList();
        }
    }


    public function userCart(Product $product)
    {
        return $this->cartList->addCart($product);
    }

    // nieuwe registratie
    public function setUser(string $username, string $password1, string $password2, string $usertype)
    {
        $this->username = $username;
        if ($password1 == $password2) {
            $password = password_hash($password1, PASSWORD_DEFAULT);
            $this->password = $password1;
            $userId = Db::$db->insert("user", ["username" => $username, "password1" => $password, "usertype" => $usertype]);
            $this->id = $userId;
        }
    }

    //één user ophalen uit db
    public static function getUser(int $id)
    {
        //tabellen en kolom selecteer ik
        $columns = [
            'user' => ['id', 'username', 'usertype'],
        ];

        $params = [
            'id' => $id
        ];
        //haal 1 user uit db
        $user = Db::$db->select($columns, $params);
        //maak static users leeg
        self::$users = [];
        //maak een object van de opgehaalde user uit de db
        $userObject = new User( $user['username'],$user['id'],$user['usertype']);
        return $userObject;
    }

    //alle users uit db
    public static function getUsers()
    {
        //wat selecteer ik
        $columns = [
            'user' => ['username', 'id']
        ];

        // haal alle user op
        $users = Db::$db->select($columns);

        //maak static leeg
        self::$users = [];

        //voor de gehele array maak je een object aan per user
        foreach ($users as $user) {
            $userObject = new User($user['username'], $user['id'], $user['usertype']);
        }
        return self::$users;
    }

    public function getUsername(): string
    {
        return $this->username;
    }




    //dit is om je wachtwoord the controleren
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


    public static function login(string $username, string $password)
    {
        $columns = [
            'user' => ['id', 'username', 'password1', 'usertype'],
        ];

        $params = [
            'username' => $username,
        ];
        //haal 1 user uit db
        $user = Db::$db->select($columns, $params);
//        var_dump($user);
        if(password_verify($password, $user[0]['password1']))
        {
            $user = new User($user[0]['username'], $user[0]['usertype'], $user[0]['id']);
            return $user;
        } else {
            return false;
        }
    }

    public function setFavourite(int $productid, int $userId)
    {
        Db::$db->insert("favourites", ["userid" => $userId, "productid" => $productid]);
    }

    public function getFavouriteList()
    {
        $columns = [
            'favourites' => ['userid', 'id', 'productid'],
            'user' => [],
            'products' => ['brand', 'description' , 'price' , 'imageName']
        ];

        $params = [
            'favourites.productid' => "products.id",
            'favourites.userid' => $this->id,
            'user.id' => 'favourites.userid'
        ];

        $favouriteArray = Db::$db->select($columns, $params);

        foreach ($favouriteArray as $fav) {
        $fav = new Product($fav['productid'],$fav['productid'],$fav['productid'],$fav['productid'],$fav['productid']);
        }
        return $favouriteArray;
    }

    public function getCartList()
    {
        return $this->cartList;
    }

    /**
     * @return string
     */
    public function getUsertype(): string
    {
        return $this->usertype;
    }

//    public function updateUser()
//    {
//        $this->username = "Bla";
//        Db::$db->update("user", ["username" => $this->username], ["id" => $this->id]);
//    }

    public function deleteFavourite(int $id)
    {
       Db::$db->delete("favourites", [ "id" => $id]);
    }
}

