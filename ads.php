<?php
require './includes/app.php';
include_template("header");
?>

<main class="container section">
    <h1>Our Houses and Apartments for Sale</h1>
    <?php 
    $limit = 20;
    include 'includes/templates/ads.php';
    ?>
</main>

<?php
include_template("footer");
?>