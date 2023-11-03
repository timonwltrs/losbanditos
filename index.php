<?php

global $product;
require_once "vendor/autoload.php";
require_once "include/smarty-4.3.0/libs/Smarty.class.php";


ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $template->assign('username', $user->getUsername());
    //db versie moet nog gebeuren
    $user->setCart();
}


if (isset($_SESSION['username'])) {
    // zoek user is $users en maak $user aan
    foreach (User::$users as $checkuser) {
        if ($checkuser->getUsername() == $_SESSION['username']) {
            $user = $checkuser;
            //var_dump($user);
            break;
        }
    }
}


switch ($action) {
    case "registerform":
        // formulier laten zienx
        $template->display('template/registratieform.tpl');
        break;

    case "register":
        if (!empty($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {
            $user = new User($_POST['username']);
            $user->setUser($_POST['username'], $_POST['password1'], $_POST['password2']);
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
        if (!empty($_POST['brand'] && !in_array($_POST['brand'], array_column(Product::$products, 'brand')))) {
            $product = new Product($_POST['productid'], $_POST['brand'], $_POST['description'], $_POST['price'], $_POST['imagename']);
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
        if (!empty($_POST['name']) && !empty($_POST['review'])) {
            $product->addReview($_POST['name'], $_POST['rating'], $_POST['review']);
        }
        $template->assign('name', $_GET['name']);
        $template->assign('product', $product);
        $template->display('template/productDetail.tpl');
        break;

    case "changeProductForm":
        $template->assign('product', Product::productDetail($_GET['name']));
        $template->display('template/changeProductForm.tpl');
        break;

    case "changeProduct":
        $product = Product::getProductById(intval($_POST['id']));
        $product->changeProduct($_POST['brand'], $_POST['description'], $_POST['price'], $_POST['imageName']);
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

//        notifications
    case "error":
        $template->display('template/noti/error.tpl');
        break;

    case "cartEmpty":
        $template->display('template/noti/cartEmpty.tpl');
        break;

    case "cartEmptySuccess":
        $template->display('template/noti/cartEmptySuccess.tpl');
        break;

    case "favouriteMustLogIn":
        $template->display('template/noti/favouriteMustLogIn.tpl');
        break;

    case "login":
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = User::login($_POST['username'], $_POST['password']);
            if ($user === false) {
                // geef fout aan
                echo "fout";
                $template->display('template/layout.tpl');
            } else {
                // ingelogd
                header("Location: index.php?action=inlogSuccess");
            }
        } else {
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
        if (isset($_SESSION['user']) && $user->getUsername() !== null){
            if ($_POST['fav']) {
                $user->setFavourite(intval($_POST['productid']), $_SESSION['user']->getId());
            } else {
                $template->display('template/noti/error.tpl');
            }
        }
        header("Location: index.php?action=favourites");
        break;

    case "favouritesDelete":

        if ($_POST['deleteFav']){
            $user->deleteFavourite(intval($_POST['id']));
            header('Location: index.php?action=favourites');
        }
        break;

    case "favourites":
        if (isset($_SESSION['user']) && $user->getUsername() !== null)
        {
            $favList = $user->getFavouriteList();
            if (empty($favList)) {
                $template->display('template/noti/favouriteEmpty.tpl');
            } else {
                $template->assign('favourites', $favList);
                $template->display('template/favourites.tpl');
            }
        } else {
            header("Location: index.php?action=favouriteMustLogIn");
        }
//        echo "<pre>";
//        var_dump($user->getFavouriteList());
        break;



    case "cartAdd":
        if (isset($_SESSION['user']) && $user->getUsername() !== null) {
            if ($_POST['cart']) {
                $product = Product::productDetail($_POST['name']);
                $user->userCart($product);
            }
        } else {
            header("Location: index.php?action=error");
        }
        header("Location: index.php?action=cartIndex");
        break;

    case "cartIndex":
        if (isset($_SESSION['user']) && $user->getUsername() !== null) {
            $cartList = $user->getCartList();
            if ($cartList === null || empty($cartList->getCart())) {
                $template->display('template/noti/cartEmpty.tpl');
            } else {
                $template->assign('price', $cartList->getTotalPrice());
                $template->assign('products', $cartList->getCart());
                $template->display('template/cartIndex.tpl');
            }
        } else {
            $template->display('template/noti/error.tpl');

        }
        break;


    case "cartDelete":
        if ($user->getCartList()->removeItem($_POST['brand'])) {

            header("Location: index.php?action=cartEmptySuccess");
        }
        break;

    case "cartCompleteDelete":
        if (empty($user->getCartList()->removeCart($_POST['brand']))) {
            header("Location: index.php?action=cartEmptySuccess");
        }
        break;



    default:
        $template->assign('users', User::$users);
        $template->display('template/layout.tpl');
}
////
//echo "<pre>";
//var_dump($_SESSION);
