<?php
use App\Property; 
$properties = Property::getRecords($limit);
?>

<div class="container-ads">
    <?php foreach($properties as $property): ?>
        <div class="ad">
            <img loading="lazy" width="200" height="300" src="/images/<?php echo $property->image;?>" alt="ad image">
            <div class="content-ad">
                <h3><?php echo $property->title; ?></h3>
                <p class="justify-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.Lorem, ipsum dolor sit amet consectetur</p>
                <p class="price"><?php echo "$" . $property->price;?></p>
                <ul class="characteristics-icons">
                    <li>
                        <img src="./build/img/icono_wc.svg" alt="wc icon" loading="lazy">
                        <p><?php echo $property->wc;?></p>
                    </li>
                    <li>
                        <img src="./build/img/icono_dormitorio.svg" alt="bedroom icon" loading="lazy">
                        <p><?php echo $property->rooms;?></p>
                    </li>
                    <li>
                        <img src="./build/img/icono_estacionamiento.svg" alt="park icon" loading="lazy">
                        <p><?php echo $property->parking;?></p>
                    </li>
                </ul>
                <a href="/ad.php?id=<?php echo $property->id;?>" class="button-yellow-block">See property</a>
            </div><!--.content-ad-->
        </div><!--.ad-->
    <?php endforeach; ?>
</div><!--.container-ads-->

<?php
mysqli_close($db);
?>