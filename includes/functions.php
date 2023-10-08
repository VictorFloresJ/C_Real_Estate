<?php
require "app.php";

function include_template(string $name, bool $home = false) : void {
    include TEMPLATES_URL . "{$name}.php";
}    

function is_auth() {
    session_start();
    $auth = $_SESSION["login"];
    if($auth) {
        return true;
    }
    return false;
}