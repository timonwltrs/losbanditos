<?php

namespace Losbanditos;



session_start();

if (isset($_POST['submit'])) {
    $logins = array('Henk' => '123', 'username' => 'password1', 'username2' => 'password2');

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($logins[$username]) && $logins[$username] == $password) {

        $_SESSION['userData']['username'] = $logins[$username];
        header("location:/index.php");
        exit;
    } else {
        $msg = "<span style='color:red'>Invalid Login Details</span>";
    }
}

//class User
//{
//    private string $username;
//    private string $password;
//
//    public function register(string $username, string $password1, string $password2)
//    {
//        if ($this->checkPassword($password1, $password2)) {
//            // registeren
//            $this->username = $username;
//            $this->password = password_hash($password1, PASSWORD_BCRYPT);
//        } else {
//            //foutmelding geven
//
//        }
//
//    }
//
//    public function checkPassword(string $password1, string $password2)
//    {
//        if ($password1 === $password2) {
//            return true;
//        }
//        return false;
//    }
//
//
//}

