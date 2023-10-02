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
                <nav class="nav">
                    <a href="about-us.php">About us</a>
                    <a href="ads.php">Adversiments</a>
                    <a href="blog.php">Blog</a>
                    <a href="contact-us.php">Contact us</a>
                </nav>
            </div> <!--.bar-->
        </div><!--.content-header-->
    </header><!--.header-->

    <main class="container section center-content">
        <h1>Page title</h1>

        <picture>
            <source srcset="/build/img/destacada.avif" type="image/avif">
            <source srcset="/build/img/destacada.webp" type="image/webp">
            <img loading="lazy" width="200" height="300" src="/build/img/destacada.jpg" alt="property image">
        </picture>

        <div class="property-summary">
            <p class="price">$3,000,000.00</p>
            <ul class="characteristics-icons">
                <li>
                    <img src="./build/img/icono_wc.svg" alt="wc icon" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img src="./build/img/icono_dormitorio.svg" alt="bedroom icon" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img src="./build/img/icono_estacionamiento.svg" alt="park icon" loading="lazy">
                    <p>3</p>
                </li>
            </ul>
            <p class="justify-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat officiis, ut quidem enim temporibus unde recusandae excepturi sed corporis porro, inventore cum quas iste. Soluta sit tenetur explicabo sint suscipit! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum dolor in necessitatibus atque. Nesciunt sed quaerat necessitatibus. Ipsam, facilis. Libero sed possimus, nobis ea officia magni optio tempora eos reprehenderit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nisi libero voluptatem fuga enim cum sed fugit alias. Iure ad iusto soluta rerum voluptate libero quaerat architecto, deserunt dolores nulla.</p>
            <p class="justify-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat officiis, ut quidem enim temporibus unde recusandae excepturi sed corporis porro, inventore cum quas iste. Soluta sit tenetur explicabo sint suscipit! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum dolor in necessitatibus atque. Nesciunt sed quaerat necessitatibus. Ipsam, facilis. Libero sed possimus, nobis ea officia magni optio tempora eos reprehenderit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nisi libero voluptatem fuga enim cum sed fugit alias. Iure ad iusto soluta rerum voluptate libero quaerat architecto, deserunt dolores nulla.</p>
        </div>
    </main>

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
</body>

</html>