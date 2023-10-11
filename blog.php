<?php
require './includes/app.php';
include_template("header");
?>

<main class="container section center-content">
    <h1>Our Blog</h1>

    <article class="blog-post">
        <div class="post-image">
            <picture>
                <source srcset="build/img/blog1.avif" type="image/avif">
                <source srcset="build/img/blog1.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/blog1.jpg" alt="blog post image">
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
                <img loading="lazy" width="200" height="300" src="build/img/blog2.jpg" alt="blog post image">
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

<?php
include_template("footer");
?>