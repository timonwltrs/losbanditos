<?php

namespace Losbanditos;

class Client
{
    public static mixed $clients;
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function authenticate($username1, $password1, $password2)
    {
        return ($this->username === $username1 && $this->password === $password1 && $this->password === $password2);
    }

    public function Client(mixed $username, mixed $password1, mixed $password2)
    {
    }
}
