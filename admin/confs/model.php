<?php

require_once "config.php";

class Model
{
    protected $table;
    public function __construct()
    {
        DB::connect();
    }

    protected function query($sql, $params = [])
    {
        $statement = DB::$pdo->prepare($sql);
        $statement->execute($params);
        return $statement;
    }

    public function all()
    {
        $sql = "select * from {$this->table}";
        $result = $this->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
}
