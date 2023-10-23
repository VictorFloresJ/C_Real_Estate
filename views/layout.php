<?php 
session_start();
$auth = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>

    <!--Styles-->
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $home ? "home" : " "; ?>">
        <div class="container content-header">
            <div class="bar">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="page logo">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="responsive menu icon">
                </div>

                <div class="right">
                    <img src="/build/img/dark-mode.svg" alt="dark mode icon" class="dark-mode-button">
                    <nav class="nav">
                        <a href="/aboutus">About us</a>
                        <a href="/properties">Adversiments</a>
                        <a href="/blog">Blog</a>
                        <?php if ($auth) : ?>
                            <a href="/logout">Log out</a>
                        <?php else : ?>
                            <a href="/login">Log in</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div> <!--.bar-->
            <?php echo $home ? "<h1>Houses and Luxury Apartments for Sale</h1>" : " "; ?>
        </div><!--.content-header-->
    </header><!--.header-->

    <?php echo $content; ?>

<footer class="footer section">
        <div class="container content-footer">
            <nav class="nav">
                <a href="/aboutus">About us</a>
                <a href="/properties">Adversiments</a>
                <a href="/blog">Blog</a>
                <a href="/contact">Contact us</a>
            </nav>

            <p class="copyright">Todos los derechos reservados <?php echo date("Y"); ?> &copy;</p>
        </div>
    </footer>


    <!--Modernizr (Webp) -->
    <script src="/build/js/modernizr.js"></script>

    <!--app.js-->
    <script src="/build/js/app.js"></script>
</body>

</html>