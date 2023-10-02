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
        <h1>Our Blog</h1>

        <article class="blog-post">
                <div class="post-image">
                    <picture>
                        <source srcset="build/img/blog1.avif" type="image/avif">
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <img loading="lazy"  width="200" height="300" src="build/img/blog1.jpg" alt="blog post image">
                    </picture>
                </div><!--post-image-->
                <div class="post-text">
                    <a href="post.php">
                        <h4>Terrace on the roof of your house</h4>
                        <p class="meta-information">Wrote the: <span>02/10/2023</span> by: <span>Víctor Flores Juárez</span></p>
                        <p>Advices on how to build a terrace on the roof of your house using the best materials and saving a lot of money.</p>
                    </a>
                </div><!--post-text-->
            </article><!--blog-post-->
            <article class="blog-post">
                <div class="post-image">
                    <picture>
                        <source srcset="build/img/blog2.avif" type="image/avif">
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <img loading="lazy"  width="200" height="300" src="build/img/blog2.jpg" alt="blog post image">
                    </picture>
                </div><!--post-image-->
                <div class="post-text">
                    <a href="post.php">
                        <h4>Terrace on the roof of your house</h4>
                        <p class="meta-information">Wrote the: <span>02/10/2023</span> by: <span>Víctor Flores Juárez</span></p>
                        <p>Advices on how to build a terrace on the roof of your house using the best materials and saving a lot of money.</p>
                    </a>
                </div><!--post-text-->
            </article><!--blog-post-->
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