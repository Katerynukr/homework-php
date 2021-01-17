<?php foreach($store->getAll() as $berry): ?>
        <div class="strawberry">
        <img src=<?=$berry->imgPath?>>
        <div class="description">
        <input type="hidden" name="berry[<?= $berry -> bushID ?>]">
        Number of berries : <?= $berry ->  berriesAmount ?>
        + <?=$berry ->toGrow ?>
        </div>
        </div>
<?php endforeach ?>