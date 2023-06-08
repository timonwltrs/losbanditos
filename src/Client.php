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

    public function authenticate($username, $password)
    {
        return ($this->username === $username && $this->password === $password);
    }

    public function Client(mixed $username, mixed $password1, mixed $password2)
    {
    }
}
