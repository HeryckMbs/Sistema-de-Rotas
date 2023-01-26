<?php
namespace app\controller;

use League\Plates\Engine;

abstract class Controller
{


   public static function view(string $view, array $array = [])
   {
      $viewsPath = dirname(__FILE__, 2) . "/views";

      if (!file_exists($viewsPath . DIRECTORY_SEPARATOR . $view . '.php')) {
         throw new \Exception("A view {$view} não existe <br>");
      }

      $templates = new Engine($viewsPath);
      echo $templates->render($view, $array);
   }
}