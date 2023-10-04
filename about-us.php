<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>

    <!--Styles-->
    <link rel="stylesheet" href="./build/css/app.css">
</head>

<body>
    <header class="header">
        <div class="container content-header">
            <div class="bar">
                <a href="/">
                    <img src="./build/img/logo.svg" alt="page logo">
                </a>
                <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="responsive menu icon">
                </div>

                <div class="right">
                    <img src="build/img/dark-mode.svg" alt="dark mode icon" class="dark-mode-button">
                    <nav class="nav">
                        <a href="about-us.php">About us</a>
                        <a href="ads.php">Adversiments</a>
                        <a href="blog.php">Blog</a>
                        <a href="contact-us.php">Contact us</a>
                    </nav>
                </div>
            </div> <!--.bar-->
        </div><!--.content-header-->
    </header><!--.header-->

    <main class="container section">
        <h1>About us</h1>
        <div class="aboutus">
            <div class="aboutus-image">
                <picture>
                    <source srcset="/build/img/nosotros.avif" type="image/avif">
                    <source srcset="/build/img/nosotros.webp" type="image/webp">
                    <img loading="lazy"  width="200" height="300" src="/build/img/nosotros.jpg" alt="aboutus image">
                </picture>
            </div>
            <div class="aboutus-text justify-text">
                <blockquote>25 Years of Experience</blockquote>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta perspiciatis reiciendis, dignissimos enim exercitationem dolore eius sed eum atque recusandae voluptate ut harum dolorem veritatis sapiente eligendi aspernatur deleniti.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus nisi labore reiciendis error ut doloribus?
                </p>
            </div>
        </div>
    </main>

    <section class="container section">
        <h1>More about us</h1>

        <div class="aboutus-icons">
            <div class="icon">
                <img src="./build/img/icono1.svg" alt="security icon" loading="lazy">
                <h3>Security</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime impedit id quod at ad veniam dolor quae cumque quos dolorem sunt sint sapiente.</p>
            </div><!--icon-->
            <div class="icon">
                <img src="./build/img/icono2.svg" alt="price icon" loading="lazy">
                <h3>Price</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime impedit id quod at ad veniam dolor quae cumque quos dolorem sunt sint sapiente.</p>
            </div><!--icon-->
            <div class="icon">
                <img src="./build/img/icono3.svg" alt="time icon" loading="lazy">
                <h3>Time</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime impedit id quod at ad veniam dolor quae cumque quos dolorem sunt sint sapiente.</p>
            </div><!--icon-->
        </div> <!--.aboutus-icons-->
    </section>

    <footer class="footer section">
        <div class="container content-footer">
            <nav class="nav">
                <a href="about-us.php">About us</a>
                <a href="ads.php">Adversiments</a>
                <a href="blog.php">Blog</a>
                <a href="contact-us.php">Contact us</a>
            </nav>

            <p class="copyright">Todos los derechos reservados 2021 &copy;</p>
        </div>
    </footer>

    <!--Modernizr (Webp) -->
    <script src="./build/js/modernizr.js"></script>

    <!--app.js-->
    <script src="./build/js/app.js"></script>
</body>

</html>