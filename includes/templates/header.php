<?php 
if(!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION["login"] ?? false;

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
    <header class="header <?php echo $home ? "home" : " ";?>">
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
                        <a href="/about-us.php">About us</a>
                        <a href="/ads.php">Adversiments</a>
                        <a href="/blog.php">Blog</a>
                        <?php if ( $auth ) : ?>
                            <a href="/logout.php">Log out</a>
                        <?php else : ?>
                            <a href="/login.php">Log in</a>    
                        <?php endif; ?>
                    </nav>
                </div>
            </div> <!--.bar-->
            <?php echo $home ? "<h1>Houses and Luxury Apartments for Sale</h1>" : " "; ?>
        </div><!--.content-header-->
    </header><!--.header-->
