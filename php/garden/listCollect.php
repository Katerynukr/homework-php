<?php foreach($store->getALL() as $berry): ?>
        <div class="strawberry">
                <img src=<?=$berry->imgPath ?>>
                <div class="description">
                        Bush # <?= $berry->bushID ?>
                        Possible to collect: <?= $berry->berriesAmount ?> berries.
                        <input type="text" id="berryNumbers" name="howMany[<?= $berry->bushID ?>]" onkeyup="return checkup(this);">
                        <button class="btn-s" type="submit" id="collectSomeBerries" name="collect" value="<?= $berry->bushID ?>">Collect</button>
                        <button class="btn-s" type="submit" id="collectAllBerries" name="collectALL" value="<?= $berry -> bushID ?>">Collect all berries</button>
                </div>
        </div>
<?php endforeach ?>