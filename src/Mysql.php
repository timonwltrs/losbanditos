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

    public function select(array $columns, array $params = [])
    {
//        // TODO: Implement select() method.
        try {
            $query = "SELECT ";
            $columnClauses = [];

            if (is_array($columns)) {
                foreach ($columns as $columnTable => $columnName) {
                    if (is_array(array($columnName))) {
                        foreach ($columnName as $columnString)
                            $columnClauses[] = $columnTable . "." . $columnString;
                    }
                }
            }
            $query .= implode(", ", $columnClauses);
            $query .= " FROM " . implode(", ", array_keys($columns));

            if (!empty($params)) {
                $query .= " WHERE ";
                $conditions = [];
                foreach ($params as $key => $value) {
                    $tableAndColumn = explode(".", $key, 2);

                    if (count($tableAndColumn) === 2) {
                        $table = $tableAndColumn[0];
                        $column = $tableAndColumn[1];
                    } else {
                        $table = array_keys($columns)[0];
                        $column = $key;
                    }

                    if (is_array($value)) {
                        //BETWEEN
                        $conditions[] = $table . "." . $column . " '" . $value[0] . "' AND " . $value[1] . "'";
                    } elseif (strpos($key, "LIKE") !== false) {
                        //LIKE
                        $conditions[] = $table . "." . $column . " '$value'";
                    } elseif (strpos($key, "=") !== false) {
                        // JOIN
                        $conditions[] = $key;
                    } else {
                        // gelijk aan waarde
                        $conditions[] = $table . "." . $column . " = '$value'";

                    }
                }
                $query .= implode(' AND ', $conditions);
            }

            $result = self::$db->query($query);
            var_dump($result);
            return $result->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            throw new Exception($error->getMessage());
        }
    }

    public function insert($table, $params = []): int
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
            return self::$db->lastInsertId();
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