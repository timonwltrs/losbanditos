<?php

namespace Losbanditos;

class Db
{
    public static $db;

    public function __construct()
    {
        self::$db = new Mysql("localhost","oopdb","root","root");
    }

}