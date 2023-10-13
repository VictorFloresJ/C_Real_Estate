<?php
require '../../includes/app.php';
is_auth();

use App\Seller;

$seller = new Seller();

$errors = Seller::getErrors();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seller = new Seller($_POST);
    $errors = $seller->valid();
    if (empty($errors)) {
        $seller->save();
    }
}

include_template('header');
?>

<main class="container section">
    <h1>Add new seller</h1>

    <a href="/admin/" class="button-green">Go back</a>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" action="/admin/sellers/create.php" enctype="application/x-www-form-urlencoded">
        <?php include "../../includes/templates/form_sellers.php"; ?>
        <input type="submit" value="Add seller" class="button-green">
    </form>
</main>

<?php
include_template("footer");
?>