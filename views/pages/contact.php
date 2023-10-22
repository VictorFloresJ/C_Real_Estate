<main class="container section">
    <?php if ($message) : ?>
        <p class="alert correct"><?php echo $message; ?></p>
    <?php endif; ?>

    <h1>Contact Us</h1>

    <picture>
        <source srcset="/build/img/destacada3.avif" type="image/avif">
        <source srcset="/build/img/destacada3.webp" type="image/webp">
        <img loading="lazy" width="200" height="300" src="/build/img/destacada3.jpg" alt="contact image">
    </picture>

    <h2>Fill out the contact form</h2>

    <form class="form" method="POST" action="/contact">
        <fieldset><!--Personal information-->
            <legend>Personal information</legend>

            <label for="name">Name</label>
            <input type="text" id="name" placeholder="Your name" name="name" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>
        </fieldset>

        <fieldset><!--Personal information-->
            <legend>Property information</legend>

            <label for="options">Sell or Buy</label>
            <select id="options" name="type" required>
                <option value="" selected disabled>-- Select -- </option>
                <option value="buy">Buy</option>
                <option value="sell">Sell</option>
            </select>

            <label for="budget">Budget</label>
            <input type="number" id="budget" placeholder="Your price or budget" name="price" required>
        </fieldset>

        <fieldset>
            <legend>Contact</legend>

            <p>What is your contact preference?</p>
            <div class="contact-method">
                <input type="radio" name="contact-method" id="contact-phone" value="email" required>
                <label for="contact-email">E-Mail</label>

                <input type="radio" name="contact-method" id="contact-email" value="phone" required>
                <label for="contact-phone">Phone</label>
            </div>

            <div id="contact"></div>
        </fieldset>

        <input type="submit" value="Send" class="button-green">
    </form>
</main>