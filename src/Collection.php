<?php


namespace SON;


trait Collection
{
    /**
     * @var array
     */
    private $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Verifica se o valor existe no Array
     *
     * @param mixed $offset
     * @return bool|void
     */
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    /**
     * Busca um valor no Array
     *
     * @param mixed $offset
     * @return mixed|void
     */
    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    /**
     * Insere um valor no Array
     *
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if(is_callable($value)){
            $value = $value($this);
        }
        $this->items[$offset] = $value;
    }

    /**
     * Remove um valor do Array
     *
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }
}