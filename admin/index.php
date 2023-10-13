<?php
require '../includes/app.php';
is_auth();

use App\Property;
use App\Seller;

$properties = Property::all();
$sellers = Seller::all();

include_template("header");

$message = $_GET["message"] ?? null;
?>

<main class="container section">
    <h1>Real Estate Administrator</h1>

    <?php if ($message === '1') : ?>
        <div class="alert correct">Record created correctly</div>
    <?php endif ?>
    <?php if ($message === '2') : ?>
        <div class="alert correct">Record updated correctly</div>
    <?php endif ?>
    <?php if ($message === '3') : ?>
        <div class="alert correct">Record deleted correctly</div>
    <?php endif ?>


    <a href="/admin/properties/create.php" class="button-green">New property</a>
    <a href="/admin/sellers/create.php" class="button-yellow">New seller</a>

    <h2 class="no-margin-top">Properties</h2>
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
            <?php foreach ($properties as $property) : ?>
                <tr>
                    <td><?php echo $property->id; ?></td>
                    <td><?php echo $property->title; ?></td>
                    <td>
                        <img src="/images/<?php echo $property->image; ?>" alt="property image" class="image-table">
                    </td>
                    <td><?php echo "$" . $property->price; ?></td>
                    <td>
                        <a href="/admin/properties/update.php?id=<?php echo $property->id; ?>" class="button-yellow-block">Update</a>
                        <a href="/admin/properties/delete.php?id=<?php echo $property->id; ?>" class="button-red-block">Eliminate</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 class="no-margin-bottom">Sellers</h2>
    <table class="sellers">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sellers as $seller) : ?>
                <tr>
                    <td><?php echo $seller->id; ?></td>
                    <td><?php echo $seller->nombre . " " . $seller->apellido; ?></td>
                    <td><?php echo $seller->phone; ?></td>
                    <td>
                        <a href="/admin/sellers/update.php?id=<?php echo $seller->id; ?>" class="button-yellow-block">Update</a>
                        <a href="/admin/sellers/delete.php?id=<?php echo $seller->id; ?>" class="button-red-block">Eliminate</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php
mysqli_close($db);
include_template("footer");
?>