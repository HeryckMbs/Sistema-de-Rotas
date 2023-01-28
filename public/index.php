<?php
require '../vendor/autoload.php';
require '../routes/router.php';
define('ROOT_PATH', dirname(__FILE__,2));

function dd($params){
    echo '<pre>';
    print_r($params);
    echo '</pre>';
}
try{
    include_once(ROOT_PATH ."\config\config.php");
    $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
    $request = $_SERVER['REQUEST_METHOD'];
    
    if (!isset($routes[$request])){
        throw new Exception('ROTA NAO EXISTE');
    }
   
    if(!array_key_exists($uri,$routes[$request])){
        throw new Exception('Rota nao existe');
    }

    $controller = $routes[$request][$uri];
    $controller();
}catch(Exception $e){
    echo $e->getMessage();
}