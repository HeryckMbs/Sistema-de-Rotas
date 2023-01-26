<?php


function load( string $controller, string $action)
{
   try{
    $controllerNamespace = "app\\controller\\{$controller}";
    if(!class_exists($controllerNamespace)){
        throw new Exception("O controller {$controller} não existe");
    }

    $controllerAtual = new $controllerNamespace();
    if(!method_exists($controllerAtual,$action)){
        throw new Exception("O método {$action} não existe no {$controller}");
    }

    $controllerAtual->$action((object)$_REQUEST);
   }catch(Exception $e){
        echo $e->getMessage();
   }
}


$routes = [
    'GET' => [
        '/' => fn()=> load('HomeController','teste'),
        '/contact' => fn()=> load('ContactController','teste'),
    ],
    'POST' => [
        '/contact' => fn()=> load('ContactController','store'),
    ],
    'DELETE' =>[

    ]
];