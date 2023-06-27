<?php

require_once "vendor/autoload.php";
require_once "include/smarty-4.3.0/libs/Smarty.class.php";

require_once "include/smarty-4.3.0/libs/Smarty.class.php";

use Losbanditos\User;
use Losbanditos\Product;

session_start();
$template = new Smarty();
$template->clearAllCache();
$template->clearCompiledTemplate();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = null;
}

if (isset($_SESSION['products'])) {
    Product::$products = $_SESSION['products'];
}
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
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
        $template->assign('product', Product::productDetail($_GET['name']));
        $template->display('template/productDetail.tpl');
        break;

    case "home":
        $template->display('template/home.tpl');
        break;

    case "loginForm":
        $template->display('template/registratieform-signIn.tpl');
        break;

    case "error":
        $template->display('template/error.tpl');
        break;

    case "favouritesAdd":
        header('Location: index.php?action=error');
        break;

    case "favourites":
        $template->assign('favourites', Product::$products);
        $template->display('template/error.tpl');
        break;

    default:
        $template->display('template/layout.tpl');

        break;
}
$_SESSION['products'] = Product::$products;