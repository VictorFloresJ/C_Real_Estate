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

    <main class="container section">
        <h1>Contact Us</h1>

        <picture>
            <source srcset="/build/img/destacada3.avif" type="image/avif">
            <source srcset="/build/img/destacada3.webp" type="image/webp">
            <img loading="lazy"  width="200" height="300" src="/build/img/destacada3.jpg" alt="contact image">
        </picture>

        <h2>Fill out the contact form</h2>

        <form class="form">
            <fieldset><!--Personal information-->
                <legend>Personal information</legend>

                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Your name">

                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Your email">

                <label for="phone">Phone</label>
                <input type="tel" id="phone" placeholder="Your phone">

                <label for="message">Message</label>
                <textarea id="message"></textarea>
            </fieldset>

            <fieldset><!--Personal information-->
                <legend>Property information</legend>

                <label for="options">Sell or Buy</label>
                <select id="options">
                    <option value="" selected disabled>-- Select -- </option>
                    <option value="buy">Buy</option>
                    <option value="sell">Sell</option>
                </select>

                <label for="budget">Budget</label>
                <input type="number" id="budget" placeholder="Your price or budget">
            </fieldset>

            <fieldset>
                <legend>Contact</legend>

                <p>What is your contact preference?</p>
                <div class="contact-method">
                    <input type="radio" name="contact-method" id="contact-phone">
                    <label for="contact-email">E-Mail</label>

                    <input type="radio" name="contact-method" id="contact-email">
                    <label for="contact-phone">Phone</label>
                </div>

                <p>If you selected Phone, select the date and time.</p>

                <label for="date">Date</label>
                <input type="date" id="date">

                <label for="time">Time</label>
                <input type="time" id="time" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Send" class="button-green">
        </form>
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