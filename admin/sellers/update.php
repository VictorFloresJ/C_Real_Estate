<?php
require '../../includes/app.php';
is_auth();

$seller_id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
if (!$seller_id) {
    header("Location: /admin");
}

use App\Seller;
$seller = Seller::getRecordById($seller_id);

$errors = Seller::getErrors();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seller->syncRecord($_POST);

    $errors = $seller->valid();
    if(empty($errors)) {
        $seller->save();
    }
}

include_template('header');
?>

<main class="container section">
    <h1>Update seller information</h1>

    <a href="/admin/" class="button-green">Go back</a>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" action="" enctype="application/x-www-form-urlencoded">
        <?php include "../../includes/templates/form_sellers.php"; ?>
        <input type="submit" value="Save changes" class="button-green">
    </form>
</main>

<?php
include_template("footer");
?>