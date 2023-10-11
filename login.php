<?php
require "includes/app.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $db = connectDB();

    $email = mysqli_real_escape_string($db, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));

    $password = $_POST["password"];
    $password = mysqli_real_escape_string($db, $password);

    if (!$email) {
        $errors[] = "You must add a valid email";
    }
    if (!$password) {
        $errors[] = "You must add a password";
    }

    if (empty($errors)) {
        $query = " SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($db, $query);

        if ($result->num_rows) {
            $user = mysqli_fetch_assoc($result);
            $auth = password_verify($password, $user["password"]);

            if ($auth) {
                session_start();
                $_SESSION["user"] = $user["email"];
                $_SESSION["login"] = true;
                header("Location: /admin");
            } else {
                $errors[] = "Incorrect password";
            }
        } else {
            $errors[] = "User doesn't exist";
        }
    }
}

include_template("header");
?>

<main class="container section center-content">
    <h1>Log in</h1>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" enctype="application/x-www-form-urlencoded" action="">
        <fieldset><!--Personal information-->
            <legend>Email & Password</legend>

            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Your email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Your password" name="password" required>
        </fieldset>

        <input type="submit" value="Log in" class="button-green">
    </form>
</main>

<?php
include_template("footer");
?>