<?php

namespace Losbanditos;

use PDO;
use PDOException;
use Exception;

class Mysql implements Database
{
    public static $db;


    public function __construct(string $host, string $dbname, string $username, string $password)
    {
        // TODO: Implement connact() method.
        try {
            self::$db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
            self::$db->setATTRIBUTE(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->setATTRIBUTE(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            throw new Exception($error->getMessage());
        }

    }

    public function select()
    {
        // TODO: Implement select() method.
    }

    public function insert($table, $params = []): void
    {
        try {
            // TODO: Implement insert() method.
            $colums = implode(',', array_keys($params));
            $values = (":" . implode(', :', array_keys($params)));
            $query = self::$db->prepare("INSERT INTO $table ($colums) VALUES ($values)");
            foreach ($params as $key => $value) {
                $query->bindValue(':' . $key, $value);
            }
            $query->execute();
        } catch (PDOException $error) {
            throw new Exception($error->getMessage());
        }

    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }


}
