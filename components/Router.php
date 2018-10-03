<?php
/**
 * Created by PhpStorm.
 * User: Ra4ello
 * Date: 09.09.2018
 * Time: 10:48
 */

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);

    }

    /**
     * Returns request string
     * @return string
     */
    private function getURI(){
        if(!empty($_SERVER["REQUEST_URI"])){
            return trim($_SERVER["REQUEST_URI"] , '/');
        }
    }
    public function run()
    {
       //Получити строку запиту
        $uri = $this->getURI();
        //провірка чи існує запит в routes.php
        foreach ($this->routes as $uriPattern => $path){

            if(preg_match("~$uriPattern~", $uri)){

                $internalRoute = preg_replace("~$uriPattern~", $path,$uri);



                $segment = explode('/', $internalRoute);

                $controllerName = array_shift($segment).'Controller';
                $controllerName = ucfirst($controllerName);


                $actionName = 'action'.ucfirst(array_shift($segment));

                $parameters = $segment;


                $controllerFile = ROOT .  '/controllers/' . $controllerName . '.php';

                if(file_exists($controllerFile)){

                    include_once($controllerFile);
                }

//        Створити обєкт, викликати метот(action);

                $controllerObject = new  $controllerName;
                $result = call_user_func_array(array($controllerObject,$actionName),$parameters);
                //$result = $controllerObject->$actionName($parameters);

                if($result != null){
                    break;
                }
            }//        Підключити контроле
        }
    }
}




























