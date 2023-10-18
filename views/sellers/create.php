<main class="container section">
    <h1>Add new seller</h1>

    <a href="/admin/" class="button-green">Go back</a>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST">
        <?php include __DIR__ . "/form.php"; ?>
        <input type="submit" value="Add seller" class="button-green">
    </form>
</main>