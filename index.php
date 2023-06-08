<?php

require_once "vendor/autoload.php";
require_once "include/smarty-4.3.0/libs/Smarty.class.php";

use Losbanditos\Product;
use Losbanditos\User;
use Losbanditos\Client;
use Losbanditos\Login;


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

if (isset($_SESSION['clients'])) {
    Client::$clients = $_SESSION['clients'];
}

$login = new Login();


$login->logout();

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
        if (!empty($_POST['brand'])) {
            $product = new Product($_POST['brand'], $_POST['description'], $_POST['price'], $_POST['imagename'], $_POST['produrl']);
        }
        break;
    case "productIndex":

        $template->assign('products', Product::$products);
        $template->display('template/productIndex.tpl');
        break;

    case "productDetail":
        $template->assign('products', Product::$products);
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
        if (!empty($_POST['username'])) {
            $client = new Client($_POST['username'], $_POST['password']);
            $client->Client($_POST['username'], $_POST['password'], $_POST['password']);
        }
        if ($login->login("Henk", "123")) {
            echo "Login successful! Welcome, " . $login->getLoggedInUser()->getUsername();
        } else {
            echo "Login failed!";
        }
        break;


    default:
        $template->display('template/layout.tpl');


}
$_SESSION['products'] = Product::$products;

//Browser link
//https://losbanditos/index.php?action=productIndex