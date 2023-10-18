<?php 
namespace Controllers;
use MVC\Router;
use Model\Seller;

class SellerController 
{
    public static function create(Router $router)
    {
        $seller = new Seller();
        $errors = Seller::getErrors();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $seller = new Seller($_POST);
            $errors = $seller->valid();
            if (empty($errors)) {
                $seller->save();
            }
        }

        $router->render('sellers/create' , [
            'seller' => $seller,
            'errors' => $errors
        ]);
    }

    public static function update(Router $router)
    {
        $id = validID('/admin');
        $seller = Seller::getRecordById($id);
        $errors = Seller::getErrors();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $seller->syncRecord($_POST);
            $errors = $seller->valid();
            if (empty($errors)) {
                $seller->save();
            }
        }

        $router->render('sellers/update' , [
            'seller' => $seller,
            'errors' => $errors
        ]);
    }

    public static function delete (Router $router) 
    {
        $id = validID("/admin");
        $seller = Seller::getRecordById($id);
        $router->render('sellers/delete' , [
            'seller' => $seller
        ]);
    }
}
