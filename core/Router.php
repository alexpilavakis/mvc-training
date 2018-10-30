<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 2:38 ΜΜ
 */

namespace MVCTraining\core;

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
        $parse = explode('/',$uri);
        if(count($parse) > 1)
        {
            $controller = $parse [0]."Controller";
            $action = $parse[1];
            $parameters = $parse [2];
            $uri = $action;
        }
        else
        {
            $parse =  explode('@',$this->routes[$Methodtype][$uri]);
            $controller = $parse [0];
            $action = $parse [1];
            $parameters = null;
        }
        try
        {
            if (array_key_exists($uri,$this->routes[$Methodtype]))
            {
                return $this->callAction($controller, $action, $parameters);
            }
            else{
                redirect('');
            }
        }catch (Exception $e){
                session_destroy();
            die("Page $uri not found");
        }
    }

    protected function callAction($controller, $action, $parameters)
    {

        $controller = "MVCTraining\\app\\controllers\\{$controller}";

        $controller = new $controller;

        if (!method_exists($controller, $action)){

            throw Exception ("Controller {$controller} does not respond to {$action}");
        }
        return $controller->$action($parameters);



    }


}