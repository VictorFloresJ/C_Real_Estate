<?php 
namespace Controllers;

use MVC\Router;
use Model\Property;

class PagesController
{
    public static function index(Router $router) 
    {
        $properties = Property::getRecords(3);
        $router->render('pages/index', [
            'properties' => $properties,
            'home' => true
        ]);
    }

    public static function aboutus(Router $router) 
    {
        $router->render('pages/aboutus', []);
    }

    public static function properties(Router $router) 
    {
        $properties = Property::all();
        $router->render('pages/properties', [
            'properties' => $properties
        ]);
    }

    public static function property(Router $router) 
    {
        $id = validID('/admin');
        $property = Property::getRecordById($id);
        $router->render('pages/property', [
            'property' => $property
        ]);
    }

    public static function blog(Router $router) 
    {
        $router->render('pages/blog', []);
    }

    public static function post(Router $router) 
    {
        $router->render('pages/post', []);
    }

    public static function contact(Router $router) 
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }
        $router->render('pages/contact', [

        ]);
    }
}
?>