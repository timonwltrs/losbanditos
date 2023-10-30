<?php

namespace Losbanditos;

interface database
{
    public function __construct(string $host, string $dbname, string $username, string $password);

    public function select(array $columns, array $params);

    public function insert(string $table, array $params);

    public function update();

    public function delete();
}
