<?php foreach($store->getAll() as $berry): ?>
        <div class="strawberry">
            <img src=<?=$berry->imgPath?>>
            <div class="description">
                Strawberry number : <?= $berry->bushID ?>
                Number of berries : <?=  $berry->berriesAmount?>
                <button type="button" class="btn-s" name="deleteElement" value="<?=  $berry -> bushID ?>">Delete</button>
            </div>
        </div>
<?php endforeach ?>