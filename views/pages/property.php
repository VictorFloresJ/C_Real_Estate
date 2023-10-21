<main class="container section center-content">
    <h1><?php echo $property->title;?></h1>

    <img loading="lazy" width="200" height="300" src="/images/<?php echo $property->image;?>" alt="property image">

    <div class="property-summary">
        <p class="price"><?php echo "$" . $property->price;?></p>
        <ul class="characteristics-icons">
            <li>
                <img src="/build/img/icono_wc.svg" alt="wc icon" loading="lazy">
                <p><?php echo $property->wc;?></p>
            </li>
            <li>
                <img src="/build/img/icono_dormitorio.svg" alt="bedroom icon" loading="lazy">
                <p><?php echo $property->rooms;?></p>
            </li>
            <li>
                <img src="/build/img/icono_estacionamiento.svg" alt="park icon" loading="lazy">
                <p><?php echo $property->parking;?></p>
            </li>
        </ul>
        <p class="justify-text"><?php echo $property->description;?></p>
    </div>
</main>