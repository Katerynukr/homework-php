<?php foreach($store->getAll() as $berry): ?>
<?php _d($berry, 'list----')?>
<?php _d($berry, 'obj'); ?>
        <div class="strawberry">
            <img src=<?=$berry->imgPath?>>
            <div class="description">
                Strawberry number : <?= $berry->bushID ?>
                Number of berries : <?=  $berry->berriesAmount?>
                <p>Price $ : <?= $berry->priceUSD ?></p>
                <button type="button" class="btn-s" name="deleteElement" value="<?=  $berry -> bushID ?>">Delete</button>
            </div>
        </div>
<?php endforeach ?>

