<?php

require_once "vendor/autoload.php";
require_once "include/smarty-4.3.0/libs/Smarty.class.php";

use Losbanditos\User;

$template = new Smarty();

if(isset($_GET['action']))
{
    $action = $_GET['action'];
}else{
    $action = null;
}


switch($action){
    case "registerform":
        // formulier laten zien
        $template->display('template/registratieform.tpl');
        break;
    case "register":
        // $_POST['username'], $_POST['password1'], $_POST['password2']
        if(!empty($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2']))
        {
            $user = new User();
            $user->register($_POST['username'], $_POST['password1'], $_POST['password2']);
        }


        $template->display('template/register.tpl');
        break;
    default:
        $template->display('template/layout.tpl');

}

var_dump($user);