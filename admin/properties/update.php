<?php
require '../../includes/functions.php';
$auth = is_auth();
if (!is_auth()) {
    header("Location: /");
}

$property_id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
if (!$property_id) {
    header("Location: /admin");
}

require "../../includes/config/database.php";
$db = connectDB();

$query = "SELECT * FROM sellers";
$result = mysqli_query($db, $query);

$query = " SELECT * FROM properties WHERE id = '$property_id' ";
$property = mysqli_fetch_assoc(mysqli_query($db, $query));

$title = $property["title"];
$price = $property["price"];
$image = $property["image"];
$description = $property["description"];
$rooms = $property["rooms"];
$wc = $property["wc"];
$parking = $property["parking"];
$sellers_id = $property["sellers_id"];

$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = mysqli_real_escape_string($db, $_POST["title"]);
    $price = mysqli_real_escape_string($db, $_POST["price"]);
    $image = $_FILES["image"];
    $description = mysqli_real_escape_string($db, $_POST["description"]);
    $rooms = mysqli_real_escape_string($db, $_POST["rooms"]);
    $wc = mysqli_real_escape_string($db, $_POST["wc"]);
    $parking = mysqli_real_escape_string($db, $_POST["parking"]);
    $sellers_id = mysqli_real_escape_string($db, $_POST["sellers_id"]);
    $created = date("Y/m/d");

    if (!$title) {
        $errors[] = "You must add a title";
    }
    if (!$price) {
        $errors[] = "You must add a price";
    }
    if ($image["size"] > 1000 * 1000) {
        $errors[] = "Your image is too heavy";
    }
    if (strlen($description) < 50) {
        $errors[] = "You must add a valid description (50 or more characters)";
    }
    if (!$rooms) {
        $errors[] = "You must add the number of rooms";
    }
    if (!$wc) {
        $errors[] = "You must add the number of wc";
    }
    if (!$parking) {
        $errors[] = "You must add the number of parking";
    }
    if (!$sellers_id) {
        $errors[] = "You must select the seller";
    }

    if (empty($errors)) {
        $folder_images = "../../images/";

        if (!is_dir($folder_images)) {
            mkdir($folder_images);
        }

        $name = "";
        
        if ($image["name"]) {
            unlink($folder_images . $property["image"]);
            $name = md5(uniqid(rand(), true)) . ".jpg";
            move_uploaded_file($image["tmp_name"], $folder_images . $name);
        } else {
            $name = $property["image"];
        }

        $query = "UPDATE properties
                  SET 
                    title = '$title', 
                    price = '$price', 
                    image = '$name',
                    description = '$description', 
                    rooms = '$rooms', 
                    wc = '$wc', 
                    parking = '$parking', 
                    sellers_id = '$sellers_id'
                  WHERE id = '$property_id' ";

        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: /admin?message=2');
        }
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
        <fieldset>
            <legend>General information</legend>

            <label for="title">Title:</label>
            <input type="text" id="title" placeholder="Property title" name="title" value="<?php echo $title; ?>">

            <label for="price">Price:</label>
            <input type="number" id="price" placeholder="Property price" name="price" value="<?php echo $price; ?>">

            <label for="image">Image:</label>
            <input type="file" id="image" accept="image/jpeg, image/png" name="image">

            <img src="/images/<?php echo $image;?>" alt="property image">

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $description; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Property information:</legend>

            <label for="rooms">Rooms:</label>
            <input type="number" id="rooms" placeholder="Ej: 3" min="1" max="9" name="rooms" value="<?php echo $rooms; ?>">

            <label for="wc">WC:</label>
            <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9" name="wc" value="<?php echo $wc; ?>">

            <label for="parking">Parking:</label>
            <input type="number" id="parking" placeholder="Ej: 3" min="1" max="9" name="parking" value="<?php echo $parking; ?>">
        </fieldset>

        <fieldset>
            <legend>Seller</legend>

            <select name="sellers_id">
                <option value="" selected disabled>-Select-</option>
                <?php while ($seller = mysqli_fetch_assoc($result)) : ?>
                    <option <?php echo $sellers_id === $seller["id"] ? "selected" : " "; ?> value="<?php echo $seller["id"]; ?>">
                        <?php echo $seller['nombre'] . " " . $seller['apellido']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Update property" class="button-green">
    </form>
</main>

<?php
include_template("footer");
?>