<?php 
namespace Controllers;
use MVC\Router;
use Model\Property;
use Model\Seller;
use Intervention\Image\ImageManagerStatic as Image;


class PropertyController
{
    public static function index(Router $router)
    {
        $properties = Property::all();
        $sellers = Seller::all();

        $result = $_GET["message"] ?? null;

        $router->render('properties/admin', [
            'properties' => $properties,
            'sellers' => $sellers,
            'result' => $result
        ]);
    }

    public static function create(Router $router)
    {
        $errors = Property::getErrors();
        $property = new Property;
        $sellers = Seller::all();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $image = $_FILES["image"];
            $name = md5(uniqid(rand(), true)) . ".jpg";

            $property = new Property($_POST);

            if ($_FILES["image"]["tmp_name"]) {
                $image = Image::make($_FILES["image"]["tmp_name"])->fit(800, 600);
                $property->setImage($name);
            }

            $errors = $property->valid();
            if (empty($errors)) {
                if (!is_dir(FOLDER_IMAGES)) {
                    mkdir(FOLDER_IMAGES);
                }
                $image->save(FOLDER_IMAGES . $name);
                $property->save();
            }
        }

        $router->render('properties/create', [
            'property' => $property,
            'sellers' => $sellers,
            'errors' => $errors
        ]);
    }

    public static function update(Router $router)
    {
        $errors = Property::getErrors();
        $sellers = Seller::all();
        $id = validID('/admin');
        $property = Property::getRecordById($id);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $property->syncRecord($_POST);
            $errors = $property->valid();
            if (empty($errors)) {
                if ($_FILES["image"]["tmp_name"]) {
                    $name = md5(uniqid(rand(), true)) . ".jpg";
                    $image = Image::make($_FILES["image"]["tmp_name"])->fit(800, 600);
                    // This method deletes previous image and set the new one
                    $property->setImage($name);
                    $image->save(FOLDER_IMAGES . $property->image);
                }
                $property->save();
            }
        }

        $router->render('properties/update', [
            'property' => $property,
            'sellers' => $sellers,
            'errors' => $errors
        ]);
    }

    public static function delete (Router $router) 
    {
        $id = validID('/admin');
        $property = Property::getRecordById($id);
        
        $router->render('properties/delete', [
            'property' => $property
        ]);
    }
}
