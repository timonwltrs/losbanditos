<?php

require_once "vendor/autoload.php";
require_once "include/smarty-4.3.0/libs/Smarty.class.php";


ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);

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

if (isset($_SESSION['users'])) {
    User::$users = $_SESSION['users'];
}


if (isset($_SESSION['products'])) {
    Product::$products = $_SESSION['products'];
}
if (isset($_SESSION['username'])) {
    // zoek user is $users en maak $user aan
    foreach(User::$users as $checkuser)
    {
        if($checkuser->getUsername() == $_SESSION['username'])
        {
            $user = $checkuser;
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
        // $_POST['username'], $_POST['password1'], $_POST['password2']
        if (!empty($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {
            $user = new User();
            $user->register($_POST['username'], $_POST['password1'], $_POST['password2']);
        }

        $template->display('template/register.tpl');
        break;

    case "productAddform":
        $template->display('template/productAddform.tpl');
        break;

    case "productAdd":
        $template->assign('products', Product::$products);
        if(!empty($_POST['brand'] && !in_array($_POST['brand'], array_column(Product::$products, 'brand'))))
        {
            $product = new Product($_POST['brand'], $_POST['description'], $_POST['price'], $_POST['imagename'], $_POST['produrl']);
        }
        header('Location: index.php?action=productIndex');
        break;

    case "productIndex":
        $template->assign('products', Product::$products);
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
        $template->display('template/error.tpl');
        break;
    case "login":
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            if (User::login($_POST['username'], $_POST['password'])) {
                // ingelogd
                $_SESSION['username'] = $_POST['username'];
                echo "ingelogd";
                $template->display('template/layout.tpl');
            } else {
                // geef fout aan
                echo "fout";
                $template->display('template/layout.tpl');
            }
            $template->display('template/inlogSuccess.tpl');
//            ipv error, login gelukt
        }

        break;
    case "inlogsuccess":
        $template->display('template/inlogSuccess.tpl');
        break;
    case "logout":
        unset($_SESSION['username']);
        header("Location: index.php?action=home");
        exit();
        break;
    case "favouritesAdd":
        if($_POST['fav'])
        {
            $product = Product::productDetail($_POST['name']);
            $user->userFav($product);
        }
        header("Location: index.php?action=favourites");
        break;

    case "favourites":
//        $template->assign('fav', Product::productDetail($_GET['name']));
        if (isset($_SESSION['username']) === true)
        {
            $template->assign('products', $user->getFav()->getFavourites());
            $template->display('template/favourites.tpl');

        }
        else
        {
            header("Location: index.php?action=error");
        }

        break;

    default:
        $template->assign('users', User::$users);
        $template->display('template/layout.tpl');
        //$template->display('template/userpage.tpl');

}

$_SESSION['products'] = Product::$products;
$_SESSION['fav'] = Product::$productFavList;
$_SESSION['users'] = User::$users;