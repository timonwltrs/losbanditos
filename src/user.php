<?php
class User{
    private string $username;
    private string $password;


    public function register(string $username, string $password1, string $password2)
    {
        if($this->cheakPassword($password1, $password2)){
            $this->username = $username;
            $this->password = password_hash($password1);
        }
    }
}
