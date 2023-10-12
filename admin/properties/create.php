<?php
require '../../includes/app.php';
is_auth();

use App\Property;
use App\Seller;
use Intervention\Image\ImageManagerStatic as Image;

$sellers = Seller::all();

$property = new Property();
$errors = Property::getErrors();

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
        $image->save("../../images/" . $name);
        $property->save();
    }
}

include_template("header");
?>

<main class="container section">
    <h1>Create new property</h1>

    <a href="/admin/" class="button-green">Go back</a>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" action="/admin/properties/create.php" enctype="multipart/form-data">
        <?php include "../../includes/templates/form_properties.php";?>
        <input type="submit" value="Create property" class="button-green">
    </form>
</main>

<?php
include_template("footer");
?>