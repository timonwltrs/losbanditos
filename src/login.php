<?php

namespace Losbanditos;


require_once 'User.php';

class Login {
    private $loggedInUser;

    public function login($username, $password) {


        $user = new User($username, $password);

        if ($user->authenticate($username, $password)) {
            $this->loggedInUser = $user;
            $_SESSION['user'] = $user;
            return true;
        }

        return false;
    }

    public function logout() {
        unset($_SESSION['user']);
        $this->loggedInUser = null;
        session_destroy();
    }

    public function isLoggedIn() {
        return isset($_SESSION['user']);
    }

    public function getLoggedInUser() {
        return $_SESSION['user'];
    }
}
