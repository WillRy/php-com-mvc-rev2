<?php

use SON\Resolver;

$resolver = new Resolver();

$resolver['PDO'] = function (Resolver $r) {
    return new \PDO(
        'mysql:host=db;dbname=php_com_mvc_rev2',
        'root',
        'root',
        [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
    );
};

return $resolver;