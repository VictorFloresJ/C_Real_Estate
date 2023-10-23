<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController
{
    public static function login(Router $router)
    {
        $admin = Admin::getErrors();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $admin = new Admin($_POST);
            $errors = $admin->valid();
            if (empty($errors)) {
                $result = $admin->userExists();
                if (!$result) {
                    // User doesn't exists
                    $errors = Admin::getErrors();
                } else {
                    // Verify password
                    $isAuth = $admin->checkPassword($result);
                    if ($isAuth) {
                        $admin->auth();
                    } else {
                        // Incorrect password
                        $errors = Admin::getErrors();
                    }
                }
            }
        }
        $router->render('auth/login', [
            'errors' => $errors
        ]);
    }

    public static function logout(Router $router)
    {
        $router->render('auth/logout', []);
    }
}
