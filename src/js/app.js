document.addEventListener("DOMContentLoaded", function() {
    hide();
    eventListeners();
    darkMode();
});

function darkMode() {
    let mode = localStorage.getItem("mode");

    if (mode == "dark") {
        document.body.classList.add("dark-mode");
    }

    const darkmode_button = document.querySelector(".dark-mode-button");
    darkmode_button.addEventListener("click", function() {
        document.body.classList.toggle("dark-mode");
        mode = document.body.classList.contains("dark-mode") ? "dark" : "light";
        localStorage.setItem("mode", mode);
    });
}

function hide() {
    const nav = document.querySelector(".nav");
    if (window.innerWidth < 768) {
        nav.classList.add("hide");
    }
}

function eventListeners() {
    /* Desplegar menu hamburguesa */
    const mobile_menu = document.querySelector(".mobile-menu img");
    mobile_menu.addEventListener("click", function() {
        responsiveNav();
    })

    /* Mirar por el ancho de la ventana para ocultar o mostrar */
    window.addEventListener("resize", function() {
        responsiveNav_resize();
    });

    /* Muestra campos de formulario de forma condicional */
    const contactMethod = document.querySelectorAll(`input[name="contact-method"]`);
    contactMethod.forEach(input => input.addEventListener('click', showContactMethods));
}

function responsiveNav() {
    const nav = document.querySelector(".nav");
    nav.classList.toggle("hide");
}

function responsiveNav_resize() {
    const window_width = window.innerWidth;
    const nav = document.querySelector(".nav");
    if (window_width < 768) {
        nav.classList.add("hide")
    } else {
        nav.classList.remove("hide");
    }
}

function showContactMethods(event) {
    const contactDiv = document.querySelector(`#contact`);
    if (event.target.value === `email`) {
        contactDiv.innerHTML = `
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Your email" name="email" required>
        `;
    } else {
        contactDiv.innerHTML = `
            <label for="phone">Phone number</label>
            <input type="tel" id="phone" placeholder="Your phone" name="phone">

            <p>Select the date and time.</p>

            <label for="date">Date</label>
            <input type="date" id="date" name="contact_date">

            <label for="time">Time</label>
            <input type="time" id="time" min="09:00" max="18:00" name="contact_time">
        `;
    }
}