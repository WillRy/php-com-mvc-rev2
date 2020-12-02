<?php


namespace SON;


use ArrayAccess;

class Router implements ArrayAccess
{
    /**
     * @var array
     */
    private $routes = [];

    public function __construct(array $routes = [])
    {
        $this->routes = $routes;
    }


    /**
     * Verifica se o valor existe no Array
     *
     * @param mixed $offset
     * @return bool|void
     */
    public function offsetExists($offset)
    {
        return isset($this->routes[$offset]);
    }

    /**
     * Busca um valor no Array
     *
     * @param mixed $offset
     * @return mixed|void
     */
    public function offsetGet($offset)
    {
        return $this->routes[$offset];
    }

    /**
     * Insere um valor no Array
     *
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->routes[$offset] = $value;
    }

    /**
     * Remove um valor do Array
     *
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->routes[$offset]);
    }

    public function handler()
    {
        $path = empty($_SERVER['PATH_INFO']) ? '/' : $_SERVER['PATH_INFO'];
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
}