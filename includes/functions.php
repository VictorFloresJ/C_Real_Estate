<?php
    require "app.php";

    function include_template(string $name, bool $home = false) : void {
        include TEMPLATES_URL . "{$name}.php";
    }    

?>