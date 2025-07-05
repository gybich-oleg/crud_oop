<?php

namespace app\core;

/*
 *
 */
class Router
{
    public function init()
    {
        $controllerName = 'index';
        $actionName = 'index';
        if(isset($_GET['controller'])){
            $controllerName = $this->clearParam(filter_input(INPUT_GET,'controller'));
        }
        if(isset($_GET['action'])){
            $actionName = $this->clearParam(filter_input(INPUT_GET,'action'));
        }
        $controllerClass = 'app\controllers\\' . ucfirst($controllerName) . 'Controller';
        if(!class_exists($controllerClass)){
            $this->notFound();
            return;
        }
        $controller = new $controllerClass();
        if(!method_exists($controller, $actionName)){
            $this->notFound();
            return;
        }
        $controller->$actionName();

    }
    protected function clearParam(string $param)
    {
        return trim(strtolower($param));
    }
    private function notFound()
    {
        $response = new Response;
        $response->notFound();
    }

}