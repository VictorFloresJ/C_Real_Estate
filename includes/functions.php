<?php

define("TEMPLATES_URL", __DIR__ .  "/templates/");
define("FUNCTIONS_URL", __DIR__ . "/functions.php");
define("FOLDER_IMAGES", __DIR__ . "/../images/");

function include_template(string $name, bool $home = false) : void 
{
    include TEMPLATES_URL . "{$name}.php";
}    

function is_auth() : void 
{
    session_start();
    if(!$_SESSION["login"]) {
        header("Location: /");
    }
}

function debug($obj) : void 
{
    echo "<pre>";
    var_dump($obj);
    echo "</pre>";
    exit;
}

function sanitize ($html) 
{
    $sanitized = htmlspecialchars($html);
    return $sanitized;
}