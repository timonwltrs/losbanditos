<?php

require_once "vendor/autoload.php";
require_once "include/smarty-4.3.0/libs/Smarty.class.php";


ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);

use Losbanditos\CartList;
use Losbanditos\Db;
use Losbanditos\Mysql;
use Losbanditos\ProductFavList;
use Losbanditos\Product;
use Losbanditos\User;
use Losbanditos\Client;
use Losbanditos\login;


session_start();
$template = new Smarty();
$template->clearAllCache();
$template->clearCompiledTemplate();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = null;
}

$database = new Db();

if (isset($_SESSION['products'])) {
    Product::$products = $_SESSION['products'];
}
if(isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
    $template->assign('username', $user->getUsername());

}

if (isset($_SESSION['cart'])) {
    $user->setCart($_SESSION['cart']);
}

if (isset($_SESSION['username'])) {
    // zoek user is $users en maak $user aan
    foreach(User::$users as $checkuser)
    {
        if($checkuser->getUsername() == $_SESSION['username'])
        {
            $user = $checkuser;
//            var_dump($user);

            break;
        }
    }
}

switch ($action) {
    case "registerform":
        // formulier laten zien
        $template->display('template/registratieform.tpl');
        break;

    case "register":
        if (!empty($_POST['username'])&& !empty($_POST['password1']) && !empty($_POST['password2'])) {
            $user = new User($_POST['username']);
            $user->setUser($_POST['username'], $_POST['password1'],$_POST['password2']);
            header('Location: index.php?action=registerSucces');
        }
        $template->display('template/register.tpl');
        break;

    case "showUser":
        $user = User::getUser($_GET['user']);
        var_dump($user);

        break;

    case "showUsers":
        $users = User::getUsers();
        var_dump($users);
        break;


    case "productAddform":
        $template->display('template/productAddform.tpl');
        break;

    case "productAdd":
        $template->assign('products', Product::$products);
        if(!empty($_POST['brand'] && !in_array($_POST['brand'], array_column(Product::$products, 'brand'))))
        {
            $product = new Product($_POST['brand'], $_POST['description'], $_POST['price'], $_POST['imagename']);
            $product->setProduct($_POST['brand'], $_POST['description'], $_POST['price'], $_POST['imagename']);
        }
        header('Location: index.php?action=productIndex');
        break;

    case "productIndex":
        $template->assign('products', Product::getProducts());
        $template->display('template/productIndex.tpl');
        break;

    case "productDetail":
        // als POST, dan review opslaan
        $product = Product::productDetail($_GET['name']);
        if(!empty($_POST['name']) && !empty($_POST['review']))
        {
            $product->addReview($_POST['name'], $_POST['rating'], $_POST['review']);
        }

        $template->assign('name', $_GET['name']);
        $template->assign('product', $product);
        $template->display('template/productDetail.tpl');
        break;

    case "home":
        $template->display('template/home.tpl');
        break;

    case "regieForm":
        $template->display('template/registratieform.tpl');
        break;

    case "loginForm":
        $template->display('template/loginform.tpl');
        break;

    case "error":
        $template->display('template/noti/error.tpl');
        break;

    case "cartEmpty":
        $template->display('template/noti/cartEmpty.tpl');
        break;

    case "cartEmptySucces":
        $template->display('template/noti/cartEmptySuccess.tpl');
        break;

    case "login":
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = User::login($_POST['username'], $_POST['password']);
            if($user === false){
                // geef fout aan
                echo "fout";
                $template->display('template/layout.tpl');
            } else {
                // ingelogd
                $cart = $user->getCartList();
                header("Location: index.php?action=inlogSuccess");
            }
            // ipv error, login gelukt
        }else
        {
            // als login niet lukt, error pagina
            $template->display('template/error.tpl');
        }
        break;

    case "inlogSuccess":
        $template->display('template/inlogSuccess.tpl');


        break;

    case "logout":
        unset($_SESSION['username']);
        unset($_SESSION['user']);
        header("Location: index.php?action=home");
        exit();

    case "favouritesAdd":
        if($_POST['fav'])
        {
            $product = Product::productDetail($_POST['name']);
            $user->userFav($product);
        }
        header("Location: index.php?action=favourites");
        break;

    case "favourites":
        if (isset($_SESSION['username']) === true)
        {
            $template->assign('products', $user->getFav()->getFavourites());
            if (empty( $user->getFav()->getFavourites()))
            {

            }
            $template->display('template/favourites.tpl');
        }
        else
        {
            header("Location: index.php?action=error");
        }
        break;

    case "cartAdd":
        if ($_POST['cart']) {
            $product = Product::productDetail($_POST['name']);
            $user->userCart($product);
        }
        header("Location: index.php?action=cartIndex");
        break;

    case "cartIndex":
        if (isset($_SESSION['user']) && $user->getUsername() !== null)
        {
            $cartList = $user->getCartList();
            if ($cartList === null || empty($cartList->getCart())) {
                $template->display('template/noti/cartEmpty.tpl');
            } else {
                $template->assign('price', $cartList->getTotalPrice());
                $template->assign('products', $cartList->getCart());
                $template->display('template/cartIndex.tpl');
            }
        } else {
            header("Location: index.php?action=error");
        }
        break;


    case "cartDelete":
        if ($user->getCartList()->removeItem($_POST['brand']))
        {
            header("Location: index.php?action=cartEmptySuccess");
        }
        header("Location: index.php?action=cartIndex");
        break;

    case "cartCompleteDelete":
        if (empty($user->getCartList()->removeCart($_POST['brand'])))
        {
            header("Location: index.php?action=cartEmptySuccess");
        }
        break;

    default:
        $template->assign('users', User::$users);
        $template->display('template/layout.tpl');

}
$_SESSION['products'] = Product::$products;
$_SESSION['fav'] = Product::$productFavList;
$_SESSION['cart'] = Product::$productCartList;
$_SESSION['users'] = User::$users;

echo "<pre>";
var_dump($_SESSION);
