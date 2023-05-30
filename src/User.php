<?php

namespace Losbanditos;

class User
{
    private string $username;
    private string $password;

    public function register(string $username, string $password1, string $password2)
    {
        if($this->checkPassword($password1, $password2)){
            // registeren
            $this->username = $username;
            $this->password = password_hash($password1, PASSWORD_BCRYPT);
        }else{
            //foutmelding geven

        }

    }

    public function checkPassword(string $password1, string $password2)
    {
        if($password1 === $password2)
        {
            return true;
        }
        return false;
    }

}