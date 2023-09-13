<?php

namespace Losbanditos;

interface Database
{
    public function __construct(string $host,string $dbname,string $username,string $password);
    public function select();
    public function insert(string $table, array $params);
    public function update();
    public function delete();
}
