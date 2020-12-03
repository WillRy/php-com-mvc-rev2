<?php


namespace SON;


class Model
{
    private $pdo;
    protected $table;

    public function __construct(\PDO $pdo = null)
    {
        $this->pdo = $pdo;
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->getPdo()->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function getPdo()
    {
        return $this->pdo;
    }

    public function setTableName(string $table)
    {
        $this->table = $table;
    }

    public function getTableName()
    {
        return $this->table;
    }

}