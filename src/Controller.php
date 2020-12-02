<?php

namespace SON;

class Controller
{
    public function render(array $data = [], string $view = null)
    {
        if(!$view){
            /**Ex: Class UserController->index() = users/index */
            $view = $this->controllerName().'/'.debug_backtrace()[1]['function'];
        }
        extract($data);
        require __DIR__ . "/../templates/" . $view . ".tpl.php";
    }

    private function controllerName()
    {
        $class = get_class($this); //App\Controllers\UsersControllers
        $class = explode('\\',$class); //['App','Controllers','UsersControllers']
        $class = array_pop($class); // UsersControllers
        $class = preg_replace('/Controller$/', '', $class); //Users
        return strtolower($class);
    }
}