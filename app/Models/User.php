<?php


namespace App\Models;


use SON\Model;

class User extends Model
{
    protected $table = 'users';

    /**Se necessário ter um __construct, deve-se chamar o da model também*/
    public function __construct(\PDO $pdo)
    {
        parent::__construct($pdo);
    }

}