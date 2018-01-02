<?php

class router{
 
  private $routes;
  
  public function __construct(){
    $routesPath = ROOT . '/config/routes.php';
    $this->routes = include($routesPath);
    
  }
  /*
  * Returns REQUEST_URI string
  */
  private function getURI(){
    if(!empty($_SERVER['REQUEST_URI'])){
      return trim($_SERVER['REQUEST_URI'], '/');
    }
  }
  
  public function start(){
    // Помещаем строку запроса
    $uri = $this->getURI();
    
    // Нужно проверить, существует ли в роутах такой запрос?
    foreach ($this->routes as $uriPattern => $path){
      if(preg_match("~$uriPattern~", $uri)){
       
        $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
        
        
        $segments = explode('/', $internalRoute);

        $controllerName = array_shift($segments) . 'Controller';
        $actionName = array_shift($segments) . 'Action';
        
        $parameters = $segments;

          $controllerObject = new $controllerName;
          $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
          
            if ($result !== Null){
              break;
            }
        
      }
    }
  }
}