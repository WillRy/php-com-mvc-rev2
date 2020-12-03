<?php


namespace SON;


use ArrayAccess;

class Router implements ArrayAccess
{

    use Collection;

    public function handler()
    {
//        $path = empty($_SERVER['PATH_INFO']) ? '/' : $_SERVER['PATH_INFO'];
        $path = $this->getPath();

        if (strlen($path) > 1) {
            $path = rtrim($path, '/');
        }

        if ($this->offsetExists($path)) {
            return $this->offsetGet($path);
        }

        http_response_code(404);
        echo 'Página inexistente';
        exit;
    }

    public function getPath()
    {
        $parts = explode('?', $_SERVER['REQUEST_URI'], 2);
        $path = rtrim($parts[0], '/');
        $path = empty($path) ? '/' : $path;
        return $path;
    }
}