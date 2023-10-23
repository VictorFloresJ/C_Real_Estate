<main class="container section center-content">
    <h1>Log in</h1>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" enctype="application/x-www-form-urlencoded" action="/login">
        <fieldset><!--Personal information-->
            <legend>Email & Password</legend>

            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Your email" name="email">

            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Your password" name="password">
        </fieldset>

        <input type="submit" value="Log in" class="button-green">
    </form>
</main>