<?php 

namespace MVC;

class Router 
{
    public $routesGET = [];
    public $routesPOST = [];

    public function get($url, $fn)
    {
        $this->routesGET[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->routesPOST[$url] = $fn;
    }

    public function verifyRoutes()
    {
        session_start();
        $auth = $_SESSION['login'] ?? false;
        
        // Protected pages
        $routes_protected = [
            '/admin',
            '/properties/create',
            '/properties/update',
            '/properties/delete',
            '/sellers/create',
            '/sellers/update',
            '/sellers/delete'
        ];

        $urlActual = $_SERVER["PATH_INFO"] ?? "/";
        $method = $_SERVER["REQUEST_METHOD"];

        if($method === "GET") {
            $fn = $this->routesGET[$urlActual] ?? null;
        } else {
            $fn = $this->routesPOST[$urlActual] ?? null;
        }

        // Protect routes
        if (in_array($urlActual, $routes_protected) && !$auth) {
            header('Location: /');
        }

        if($fn) {
            // URL exists and there's an associated function
            call_user_func($fn, $this);
        } else {
            echo "Page not found";
        }
    }

    public function render($view, $data = [])
    {
        foreach($data as $key => $value) {
            $$key = $value;
        }
        
        ob_start();

        include __DIR__ . "/views/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/views/layout.php";
    }
}

?>