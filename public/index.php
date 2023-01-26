<?php
require '../vendor/autoload.php';
require '../routes/router.php';
function dd($params){
    echo '<pre>';
    print_r($params);
    echo '</pre>';
}
try{

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