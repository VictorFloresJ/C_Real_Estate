<?php
require '../../includes/app.php';
is_auth();

use App\Property;
use App\Seller;
use Intervention\Image\ImageManagerStatic as Image;


$property_id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
if (!$property_id) {
    header("Location: /admin");
}

$sellers = Seller::all();

$property = Property::getRecordById($property_id);

$title = $property->title;
$price = $property->price;
$image = $property->image;
$description = $property->description;
$rooms = $property->rooms;
$wc = $property->wc;
$parking = $property->parking;
$sellers_id = $property->sellers_id;

$errors = Property::getErrors();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $property->syncRecord($_POST);
    $errors = $property->valid();
    if (empty($errors)) {
        if ($_FILES["image"]["tmp_name"]) {
            $name = md5(uniqid(rand(), true)) . ".jpg";
            $image = Image::make($_FILES["image"]["tmp_name"])->fit(800, 600);
            // This method deletes previous image and set the new one
            $property->setImage($name);
            $image->save("../../images/" . $property->image);
        }
        $property->save();
    }
}

include_template("header");
?>

<main class="container section">
    <h1>Update property</h1>

    <a href="/admin/" class="button-green">Go back</a>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" action="" enctype="multipart/form-data">
        <?php include "../../includes/templates/form_properties.php"; ?>
        <input type="submit" value="Update property" class="button-green">
    </form>
</main>

<?php
include_template("footer");
?>