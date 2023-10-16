<?php 

namespace MVC;

class Router 
{
    public $routesGET = [];
    public $routesPOST = [];


    public function verifyRoutes()
    {
        $urlActual = $_SERVER["PATH_INFO"] ?? "/";
        $method = $_SERVER["REQUEST_METHOD"];

        if($method === "GET") {
            echo "Sí fue";
        }
    }
}

?>