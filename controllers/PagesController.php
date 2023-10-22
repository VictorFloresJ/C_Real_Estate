<?php 
namespace Controllers;

use MVC\Router;
use Model\Property;
use PHPMailer\PHPMailer\PHPMailer as PHPMailer;

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
        $router->render('pages/aboutus');
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
        $router->render('pages/blog');
    }

    public static function post(Router $router) 
    {
        $router->render('pages/post');
    }

    public static function contact(Router $router) 
    {
        $message = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userAnswers = $_POST;

            // Create a PHPMailer instance
            $mail = new PHPMailer();

            // Setup SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '*****************';
            $mail->Password = '*****************';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Setup Email content
            $mail->setFrom('admin@realestate.com');
            $mail->addAddress('admin@realestate.com', 'RealEstate.com');
            $mail->Subject = 'You have a new message';

            // StartHTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Define content
            $content = '<html>';
            $content .= '<p>You have a new message</p>';
            $content .= '<p>Nombre: ' . $userAnswers['name'] . '</p>';
            $content .= '<p>Message: ' . $userAnswers['message'] . '</p>';
            $content .= '<p>Type (Buy or Sell): ' . $userAnswers['type'] . '</p>';
            $content .= '<p>Budget: $' . $userAnswers['price'] . '</p>';
            $content .= '<p>Contact method: ' . $userAnswers['contact-method'] . '</p>';
            if ($userAnswers['contact-method'] === 'email') {
                $content .= '<p>Email: ' . $userAnswers['email'] . '</p>';
            } else {
                $content .= '<p>Contact time: ' . $userAnswers['contact_time'] . '</p>';
                $content .= '<p>Phone: ' . $userAnswers['phone'] . '</p>';
                $content .= '<p>Contact date: ' . $userAnswers['contact_date'] . '</p>';
            }
            $content .= '</html>';

            $mail->Body = $content;
            $mail->AltBody = 'This is altern text without HTML';

            if($mail->send()) {
                $message = 'Message sent';
            } else {
                $message = 'Error: Message not sent';
            }
        }
        $router->render('pages/contact', [
            'message' => $message
        ]);
    }
}
?>