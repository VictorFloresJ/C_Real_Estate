<fieldset>
    <legend>General information</legend>

    <label for="title">Title:</label>
    <input type="text" id="title" placeholder="Property title" name="title" value="<?php echo sanitize($property->title); ?>">

    <label for="price">Price:</label>
    <input type="number" id="price" placeholder="Property price" name="price" value="<?php echo sanitize($property->price); ?>">

    <label for="image">Image:</label>
    <input type="file" id="image" accept="image/jpeg, image/png" name="image">

    <?php if ($property->image) : ?>
        <img src="/images/<?php echo $property->image; ?>" alt="property image">
    <?php endif; ?>

    <label for="description">Description:</label>
    <textarea id="description" name="description"><?php echo sanitize($property->description); ?></textarea>
</fieldset>

<fieldset>
    <legend>Property information:</legend>

    <label for="rooms">Rooms:</label>
    <input type="number" id="rooms" placeholder="Ej: 3" min="1" max="9" name="rooms" value="<?php echo sanitize($property->rooms); ?>">

    <label for="wc">WC:</label>
    <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9" name="wc" value="<?php echo sanitize($property->wc); ?>">

    <label for="parking">Parking:</label>
    <input type="number" id="parking" placeholder="Ej: 3" min="1" max="9" name="parking" value="<?php echo sanitize($property->parking); ?>">
</fieldset>

<fieldset>
    <legend>Seller</legend>

    <select name="sellers_id">
        <option value="" selected disabled>-Select-</option>
        <?php foreach ($sellers as $seller) : ?>
            <option <?php echo sanitize($property->sellers_id) === $seller->id ? "selected" : " "; ?> value="<?php echo $seller->id; ?>">
                <?php echo sanitize($seller->nombre . " " . $seller->apellido); ?>
            </option>
        <?php endforeach; ?>
    </select>
</fieldset>