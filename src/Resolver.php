<?php


namespace SON;


class Resolver implements \ArrayAccess
{
    use Collection;

    public function handler(string $class, string $method = null)
    {

        $ref = new \ReflectionClass($class);
        $instance = $this->getInstance($ref);

        if (!$method) {
            return $instance;
        }

        $ref_method = new \ReflectionMethod($instance, $method);
        $parameters = $this->methodResolver($ref, $ref_method);

        return call_user_func_array([$instance, $method], $parameters);

    }

    private function getInstance($ref)
    {
        $constructor = $ref->getConstructor();
        if (!$constructor) {
            return $ref->newInstance();
        }

        $parameters = $this->methodResolver($ref, $constructor);

        return $ref->newInstanceArgs($parameters);
    }

    private function methodResolver($ref, $method)
    {
        $parameters = [];
        foreach ($method->getParameters() as $param) {
            /**Resolve dependencias configuradas no array de resolvers(DI) */
            if ($param->getType() !== null && $this->offsetExists($param->getClass()->getName())) {
                $parameters[] = $this->offsetGet($param->getClass()->getName());
                continue;
            }

            /**Resolve classes*/
            if ($param->getClass()) {
                $parameters[] = $this->handler($param->getClass()->getName());
                continue;
            }

            /**Resolve parâmetros opcionais. ex: $valor = null*/
            if ($param->isOptional()) {
                $parameters[] = $param->getDefaultValue();
                continue;
            }
        }

        return $parameters;
    }
}