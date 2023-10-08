<?php
require '../includes/functions.php';
$auth = is_auth();
if (!is_auth()) {
    header("Location: /");
}

require "../includes/config/database.php";
$db = connectDB();
$query = "SELECT * FROM properties";
$result = mysqli_query($db, $query);

include_template("header");

$message = $_GET["message"] ?? null;
?>

<main class="container section">
    <h1>Real Estate Administrator</h1>

    <?php if ($message === '1') : ?>
        <div class="alert correct">Property created correctly</div>
    <?php endif ?>
    <?php if ($message === '2') : ?>
        <div class="alert correct">Property updated correctly</div>
    <?php endif ?>
    <?php if ($message === '3') : ?>
        <div class="alert correct">Property deleted correctly</div>
    <?php endif ?>

    <a href="/admin/properties/create.php" class="button-green">New property</a>

    <table class="properties">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($property = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $property["id"]; ?></td>
                    <td><?php echo $property["title"]; ?></td>
                    <td>
                        <img src="/images/<?php echo $property["image"]; ?>" alt="property image" class="image-table">
                    </td>
                    <td><?php echo "$" . $property["price"]; ?></td>
                    <td>
                        <a href="/admin/properties/update.php?id=<?php echo $property["id"]; ?>" class="button-yellow-block">Update</a>
                        <a href="/admin/properties/delete.php?id=<?php echo $property["id"]; ?>" class="button-red-block">Eliminate</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php
mysqli_close($db);
include_template("footer");
?>