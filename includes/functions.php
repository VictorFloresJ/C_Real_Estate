<?php

define("TEMPLATES_URL", __DIR__ .  "/templates/");
define("FUNCTIONS_URL", __DIR__ . "/functions.php");
define("FOLDER_IMAGES", $_SERVER["DOCUMENT_ROOT"] . "/images/");

function include_template(string $name, bool $home = false): void
{
    include TEMPLATES_URL . "{$name}.php";
}

function is_auth(): void
{
    session_start();
    if (!$_SESSION["login"]) {
        header("Location: /");
    }
}

function debug($obj): void
{
    echo "<pre>";
    var_dump($obj);
    echo "</pre>";
    exit;
}

function sanitize($html)
{
    $sanitized = htmlspecialchars($html);
    return $sanitized;
}

function showNotification($code)
{
    $message = '';
    switch ($code) {
        case 1:
            $message = 'Created correctly';
            break;
        case 2:
            $message = 'Updated correctly';
            break;
        case 3:
            $message = 'Deleted correctly';
            break;
        default:
            $message = false;
            break;
    }
    return $message;
}

function validID(string $url)
{
    $property_id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
    if (!$property_id) {
        header("Location: $url");
    }

    return $property_id;
}
