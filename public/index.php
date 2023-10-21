<?php 
require_once __DIR__ . "/../includes/app.php";

use MVC\Router;
use Controllers\PropertyController;
use Controllers\SellerController;
use Controllers\PagesController;

$router = new Router();

// Private zone (admin users)
$router->get('/admin', [PropertyController::class, 'index']);
$router->get('/properties/create', [PropertyController::class, 'create']);
$router->post('/properties/create', [PropertyController::class, 'create']);
$router->get('/properties/update', [PropertyController::class, 'update']);
$router->post('/properties/update', [PropertyController::class, 'update']);
$router->get('/properties/delete', [PropertyController::class, 'delete']);

$router->get('/sellers/create', [SellerController::class, 'create']);
$router->post('/sellers/create', [SellerController::class, 'create']);
$router->get('/sellers/update', [SellerController::class, 'update']);
$router->post('/sellers/update', [SellerController::class, 'update']);
$router->get('/sellers/delete', [SellerController::class, 'delete']);

// Public zone
$router->get('/', [PagesController::class, 'index']);
$router->get('/aboutus', [PagesController::class, 'aboutus']);
$router->get('/properties', [PagesController::class, 'properties']);
$router->get('/property', [PagesController::class, 'property']);
$router->get('/blog', [PagesController::class, 'blog']);
$router->get('/post', [PagesController::class, 'post']);
$router->get('/contact', [PagesController::class, 'contact']);
$router->post('/contact', [PagesController::class, 'contact']);

$router->verifyRoutes();
?>