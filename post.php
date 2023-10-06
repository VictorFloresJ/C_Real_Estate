<?php
    require './includes/functions.php';
    include_template("header");
?>
    <main class="container section center-content">
        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>

        <picture>
            <source srcset="/build/img/destacada2.avif" type="image/avif">
            <source srcset="/build/img/destacada2.webp" type="image/webp">
            <img loading="lazy" width="200" height="300" src="/build/img/destacada2.jpg" alt="property image">
        </picture>

        <p class="meta-information">Wrote the: <span>02/10/2023</span> by: <span>Víctor Flores Juárez</span></p>
        <p class="justify-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat officiis, ut quidem enim temporibus unde recusandae excepturi sed corporis porro, inventore cum quas iste. Soluta sit tenetur explicabo sint suscipit! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum dolor in necessitatibus atque. Nesciunt sed quaerat necessitatibus. Ipsam, facilis. Libero sed possimus, nobis ea officia magni optio tempora eos reprehenderit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nisi libero voluptatem fuga enim cum sed fugit alias. Iure ad iusto soluta rerum voluptate libero quaerat architecto, deserunt dolores nulla.</p>
        <p class="justify-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat officiis, ut quidem enim temporibus unde recusandae excepturi sed corporis porro, inventore cum quas iste. Soluta sit tenetur explicabo sint suscipit! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum dolor in necessitatibus atque. Nesciunt sed quaerat necessitatibus. Ipsam, facilis. Libero sed possimus, nobis ea officia magni optio tempora eos reprehenderit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nisi libero voluptatem fuga enim cum sed fugit alias. Iure ad iusto soluta rerum voluptate libero quaerat architecto, deserunt dolores nulla.</p>
    </main>

<?php
    include_template("footer");
?>