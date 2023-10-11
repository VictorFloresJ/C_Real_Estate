<?php
require './includes/app.php';
include_template("header", true);
?>

<main class="container section">
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
</main>

<section class="container section">
    <h2>Houses and Departments for Sale</h2>

    <?php
    $limit = 3;
    include "includes/templates/ads.php";
    ?>

    <div class="see-all section align-right">
        <a href="ads.php" class="button-green">See all</a>
    </div>
</section> <!--ads section-->

<section class="contact-image">
    <h2>Find your dreams's house</h2>
    <p>Fill out the contact form below. A representative will contact you shortly.</p>
    <a href="contact-us.php" class="button-yellow">Contact Us</a>
</section><!--.contact-image-->

<div class="container section section-bottom">
    <section class="blog">
        <h3>Our Blog</h3>

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
    </section>

    <section class="testimonials">
        <h3>Testimonials</h3>
        <div class="testimonial">
            <blockquote>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus facere nam expedita nihil corrupti dicta, beatae veritatis quisquam, est excepturi earum? Eaque quidem.
            </blockquote>
            <p>- Víctor Flores Juárez</p>
        </div>
    </section><!--.testimonials-->
</div>

<?php
include_template("footer");
?>