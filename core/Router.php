<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15/10/2018
 * Time: 4:59 ΜΜ
 */

namespace core;


class Router
{

    protected $routes = [
        'GET'=> [],
        'POST' => []
    ];

    public static function load($file){


        $router = new self;

        require $file;

        return $router;

    }

    public function  get($uri, $controller){

        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller){
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $Methodtype)
    {
        //var_dump("hoho");
        try{
            if (array_key_exists($uri,$this->routes[$Methodtype]))
            {
                return $this->callAction(...explode('@',$this->routes[$Methodtype][$uri]));
            }
        }catch (Exception $e){

        }
        die("Page $uri not found");

    }

    protected function callAction($controller, $action)
    {

        $controller = "app\controllers\\{$controller}";


        $controller = new $controller;

        //die(var_dump($controller));
        if (!method_exists($controller, $action)){

            throw Exception ("Controller {$controller} does not respond to {$action}");
        }

        return $controller->$action();


    }


}
