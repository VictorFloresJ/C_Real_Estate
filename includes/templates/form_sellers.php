<fieldset>
    <legend>General information</legend>

    <label for="name">Name:</label>
    <input type="text" id="name" placeholder="Seller name" name="nombre" value="<?php echo sanitize($seller->nombre); ?>">

    <label for="last-name">Last name:</label>
    <input type="text" id="last-name" placeholder="Seller last name" name="apellido" value="<?php echo sanitize($seller->apellido); ?>">
</fieldset>

<fieldset>
    <legend>Extra information</legend>
    
    <label for="phone">Phone:</label>
    <input type="tel" id="phone" placeholder="Seller phone number" name="phone" value="<?php echo sanitize($seller->phone); ?>">

</fieldset>